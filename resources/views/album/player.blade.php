
<script type="text/javascript">
    jQuery(function ($) {
        'use strict';
        var supportsAudio = !!document.createElement('audio').canPlayType;
        if (supportsAudio) {
            var index = 0,
                playing = false,
                mediaPath = '/storage/albums/{{$album->name}}/',
                id = 1,
                tracks = [
                    @foreach($album->songs as $song)
                        {"track": id++,
                        "name": "{{$song->name}}",
                        "duration": "{{$song->length}}",
                        "file": "{{$song->url}}"
                        },
                        @endforeach
                ],

            
                buildPlaylist = $(tracks).each(function(key, value) {
                    var trackNumber = value.track,
                        trackName = value.name,
                        trackDuration = value.duration;
                    if (trackNumber.toString().length === 1) {
                        trackNumber = '0' + trackNumber;
                    }
                    $('#plList').append(
                        '<li><div class="plItem"><span class="plNum">' + trackNumber + '.</span><span class="plTitle">' + trackName + '</span><span class="plLength">' + trackDuration + '</span></div></li>'
                    );
                }),

                trackCount = tracks.length,
                npAction = $('#npAction'),
                npTitle = $('#npTitle'),
                audio = $('#audio1').on('play', function () {
                    playing = true;
                    npAction.text('Now Playing...');
                }).on('pause', function () {
                    playing = false;
                    npAction.text('Paused...');
                }).on('ended', function () {
                    npAction.text('Paused...');
                    if ((index + 1) < trackCount) {
                        index++;
                        loadTrack(index);
                        audio.play();
                    } else {
                        audio.pause();
                        index = 0;
                        loadTrack(index);
                    }
                }).get(0),

                btnPrev = $('#btnPrev').on('click', function () {
                    if ((index - 1) > -1) {
                        index--;
                        loadTrack(index);
                        if (playing) {
                            audio.play();
                        }
                    } else {
                        audio.pause();
                        index = 0;
                        loadTrack(index);
                    }
                }),

                btnNext = $('#btnNext').on('click', function () {
                    if ((index + 1) < trackCount) {
                        index++;
                        loadTrack(index);
                        if (playing) {
                            audio.play();
                        }
                    } else {
                        audio.pause();
                        index = 0;
                        loadTrack(index);
                    }
                }),

                li = $('#plList li').on('click', function () {
                    var id = parseInt($(this).index());
                    if (id !== index) {
                        playTrack(id);
                    }
                }),

                loadTrack = function (id) {
                    $('.plSel').removeClass('plSel');
                    $('#plList li:eq(' + id + ')').addClass('plSel');
                    npTitle.text(tracks[id].name);
                    index = id;
                    audio.src = mediaPath + tracks[id].file;
                },

                playTrack = function (id) {
                    loadTrack(id);
                    audio.play();
                };

            loadTrack(index);
        }
    });


    plyr.setup($('#audio1'), {});// JavaScript Document
</script>