<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Tag;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Support\MediaStream;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        return view('admin.post.index', [
            'filters' => $request->all('search', 'trashed', 'range'),
            'posts' => Post::query()
                ->withTrashed()
                ->filter($request->only('search', 'trashed'))
                ->paginate(1)
                // ->only('id', 'name')
        ]);
    }

    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function store(PostRequest $request)
    {
        DB::transaction(function () use ($request) {
            $post = Post::create([
                'title' => $request->title,
                'summary' => $request->summary,
                'body' => $request->body,
                'published_at' => $request->published_at,
                'featured_image_caption' => $request->featured_image_caption,
                'slug' => str($request->title)->slug('-')->__toString(),
                'user_id' => 1
            ]);

            $post->topic()->sync($request->topics ?? []);

            $post->tags()->sync($request->tags ?? []);

            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $post
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Featured Images
            if(isset($request->featured_images)){

                $fileAdders = $post
                    ->addMultipleMediaFromRequest(['featured_images'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_images');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $post
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('posts.index')->with('notification',[
            'title' => 'Cadastramento de Item',
            'time' => now()->diffForHumans(),
            'message' => 'Item cadastrado com êxito.'
        ]);
    }

    /**
     * Set the specified resource translation.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function settranslation(PostRequest $request, $id)
    {

        DB::transaction(function () use ($request, $id) {
            $post = Post::findOrFail($id);

            $post->setTranslation('title', strtolower($request->lang), $request->title);
            $post->setTranslation('body', strtolower($request->lang), $request->body);
            $post->setTranslation('summary', strtolower($request->lang), $request->summary);
            $post->published_at = $request->published_at;
            $post->setTranslation('featured_image_caption', strtolower($request->lang), $request->featured_image_caption);

            $post->save();

            $post->topic()->sync($request->topics ?? []);

            $post->tags()->sync($request->tags ?? []);


            // Add Possible Featured Image
            if(isset($request->featured_image)){

                $fileAdders = $post
                    ->addMultipleMediaFromRequest(['featured_image'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_image');
                    });
            }

            // Add Possible Featured Images
            if(isset($request->featured_images)){

                $fileAdders = $post
                    ->addMultipleMediaFromRequest(['featured_images'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('featured_images');
                    });
            }

            // Add Possible Documets
            if(isset($request->documents)){

                $fileAdders = $post
                    ->addMultipleMediaFromRequest(['documents'])
                    ->each(function ($fileAdder) {
                        $fileAdder->toMediaCollection('documents');
                    });
            }
        });

        return redirect()->route('posts.index')->with('notification',[
            'title' => 'Tradução de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo traduzido com êxito.'
        ]);
    }


    public function lang(Request $request, $id)
    {
        $post = Post::withTrashed()->findOrFail($id)->setLocale($request->lang);

        // dd($post->published_at?->toDateTimeLocalString());

        return view('admin.post.lang', [
            'lang' => $request->lang,
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'body' => $post->body,
                'published_at' => $post->published_at?->toDateTimeLocalString(),
                'summary' => $post->summary,
                'featured_image' => collect($post->getMedia('featured_image')),
                'featured_image_caption' => $post->featured_image_caption,
                'featured_images' => collect($post->getMedia('featured_images')),
                'documents' => collect($post->getMedia('documents')),

            ],
        ]);
    }

    /**
     * Sync the topic assigned to the post.
     *
     * @param array $incomingTopic
     * @return array
     */
    protected function syncedTopic(array $incomingTopic): array
    {
        if (collect($incomingTopic)->isEmpty()) {
            return [];
        }

        // Since the multiselect component handles single selects differently, when we try and
        // attach an existing topic it will enter as an object in an array. A newly created
        // topic will come in strictly as an array with only a name and a slug.
        $topicToAssign = empty($incomingTopic[0]) ? $incomingTopic : $incomingTopic[0];

        // dd(Topic::find($topicToAssign['id'])->id);

        $topic = Topic::find($topicToAssign['id']);

        

        // if (! $topic) {
        //     $topic = Topic::create([
        //         'id' => $id = Uuid::uuid4()->toString(),
        //         'name' => $topicToAssign['name'],
        //         'slug' => $topicToAssign['slug'],
        //         'user_id' => request()->user('website')->id,
        //     ]);
        // }

        return $topic->id;
    }

    /**
     * Sync the tags assigned to the post.
     *
     * @param array $incomingTags
     * @return array
     */
    protected function syncedTags(array $incomingTags): array
    {
        if (collect($incomingTags)->isEmpty()) {
            return [];
        }

        $tags = Tag::get(['id', 'name', 'slug']);

        return collect($incomingTags)->map(function ($item) use ($tags) {
            $tag = $tags->firstWhere('slug', $item['slug']);

            // if (! $tag) {
            //     $tag = Tag::create([
            //         'id' => $id = Uuid::uuid4()->toString(),
            //         'name' => $item['name'],
            //         'slug' => $item['slug'],
            //         'user_id' => request()->user('website')->id,
            //     ]);
            // }

            return $tag->id;
        })->toArray();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        return back()->with('notification',[
            'title' => 'Remoção de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo removido com êxito.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function restore(Request $request, $id)
    {
        $post = Post::withTrashed()->findOrFail($id);

        $post->restore();

        return back()->with('notification',[
            'title' => 'Restauração de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo restaurado com êxito.'
        ]);
    }

    public function downloadallattachments()
    {
        // Get all Media
        $attachments = Post::findOrFail(request()->model_id)->getMedia('attachments');

        return MediaStream::create('attachments.zip')->addMedia($attachments);
    }

    public function downloadsingleattachment()
    {
        return Media::findOrFail(request()->model_id);
    }

    public function deletesingleattachment(Request $request)
    {
        $media = Media::findOrFail(request()->model_id);

        $media->delete();

        return back()->with('notification',[
            'title' => 'Remoção de Registo',
            'time' => now()->diffForHumans(),
            'message' => 'Registo removido com êxito.'
        ]);
    }
}
