@component('mail::message')
# Series Updated

The series titled "{{$series->title}}" has been updated with a brand new episode. Enjoy the episode "{{$post->title}}" and find blessings and refreshment for your soul.

@component('mail::button', ['url' => route('series.episode', ['slug' => $series->slug, 'id' => $post->id])])
View Episode
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
