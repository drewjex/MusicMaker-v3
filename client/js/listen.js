function playSong() {
    var song_file = document.getElementById('file_name').value;
    MIDIjs.play('../songs/'+song_file);
}

function playGivenSong(event, song) {
    event.preventDefault(); 
    MIDIjs.play('../surveysongs/'+song);
}

function stopSong() {
    MIDIjs.stop();
}

function stop(event) {
    event.preventDefault();
    MIDIjs.stop();
}

function generateSong() {
    var song_file = document.getElementById('file_name').value;
    //var structure_elem = document.getElementById('structure').value;
    //var similar_elem = document.getElementById('similarity').value;
    //var creation_style = document.getElementById('select_style').value;

    /*if (!structure_elem || !similar_elem) {
        alert("Invalid parameters");
        return;
    }*/

    $('#loading').show();
    $('#view_struc').hide();

    $.ajax({
        type: "POST",
        url: "/musicmaker/client/engine.php",
        data: {
            data : JSON.stringify({
                "action" : 'generate',
                "params" : {
                    file : song_file
                    /*structure : structure_elem,
                    similarity : similar_elem,
                    style : creation_style*/
                }
            })
        }, 
        cache: false,

        success: function(response) {
            $('#view_structure').html(response);
            $.ajax({
                type: "POST",
                url: "/musicmaker/client/engine.php",
                data: {
                    data : JSON.stringify({
                        "action" : 'getTitle',
                    })
                }, 
                cache: false,

                success: function(response) {
                    $('#loading').hide();
                    $('#view_struc').show();
                    MIDIjs.play('../songs/'+response+'.mid');
                    document.getElementById("q4").value = response;
                }
            });
        }
    });
}

function downloadSong() {
    $.ajax({
        type: "POST",
        url: "/musicmaker/client/engine.php",
        data: {
            data : JSON.stringify({
                "action" : 'getTitle',
            })
        }, 
        cache: false,

        success: function(response) {
            document.getElementById('iframe').src = '/musicmaker/songs/'+response+'.mid';
        }
    });
}

function viewSongStructure(e) {
    e.preventDefault();
    if ($('#view_struc').text() == "View Song Structure") {
        $('#view_structure').show();
        $('#view_struc').text("Hide Song Structure");
    } else {
        $('#view_structure').hide();
        $('#view_struc').text("View Song Structure");
    }
}

function submitForm() {
    $.ajax({
        type: "POST",
        url: "/musicmaker/client/collect_survey.php",
        data: {
            data : JSON.stringify({
                "q1_1" : document.getElementById("q1_1").value,
                "q1_2" : document.getElementById("q1_2").value,
                "q2_1" : document.getElementById("q2_1").value,
                "q2_2" : document.getElementById("q2_2").value,
                "q3" : document.getElementById("q3").value,
                "q4" : document.getElementById("q4").value,
                "q5" : document.getElementById("q5").value,
                "q6" : document.getElementById("q6").value
            })
        }, 
        cache: false,

        success: function(response) {
            //redirect to thank you page.
            stopSong();
            document.getElementById("submit_button").disabled = true;
            alert("Thank you for participating in our survey!");
        }
    });
}