<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Playlist;
use App\Song;

class MypageTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testMypageTop()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->visit('/mypage')
            ->see('Follow');
 
    }

    public function testLikePageWithoutLikes()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)
            ->visit('/mypage/likes')
            ->see('There is nothing yet.');
    }

    public function testSongLikeUnlike()
    {
        $user = factory(User::class)->create();
        $uid = $user->id;

        $playlist = $user->playlists()->create([
            'name' => 'test_playlist'
        ]);
        $pid = $playlist->id;

        $songName = 'test_song';
        $song = new Song;
        $song->url = 'https://www.youtube.com/watch?v=3FzNpto-jnU';
        $song->name = $songName;

        $playlist->songs()->save($song);

        $savedSong = Song::where('name', $songName)->first();
        $sid = $savedSong->id;

        $this->actingAs($user)
            ->visit('/playlists')
            ->press('like-playlist-' . $pid)
            ->visit('/mypage/likes')
            ->see($playlist->name);

        $this->actingAs($user)
            ->visit('/playlist/' . $pid . '/songs')
            ->press('like-song-' . $sid)
            ->visit('/mypage/likes')
            ->see($songName);
    }
}
