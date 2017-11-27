 var connection = new RTCMultiConnection();
            var SIGNALING_SERVER = 'https://tranquil-bastion-41780.herokuapp.com/';
            connection.openSignalingChannel = function(config) {
                var channel = config.channel || connection.channel || 'default-namespace';
                var sender = id_salon;
                io.connect(SIGNALING_SERVER).emit('new-channel', {
                    channel: channel,
                    sender: sender
                });
                var socket = io.connect(SIGNALING_SERVER + channel);
                socket.channel = channel;
                socket.on('connect', function() {
                    if (config.callback) config.callback(socket);
                });
                socket.send = function(message) {
                    socket.emit('message', {
                        sender: sender,
                        data: message
                    });
                };
                socket.on('message', config.onmessage);
            };
            connection.session = {
                audio: true,
                video: true
            };
            connection.onstream = function(e) {
                e.mediaElement.width = 600;
                videosContainer.insertBefore(e.mediaElement, videosContainer.firstChild);
            };
            function rotateVideo(mediaElement) {
                mediaElement.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(0deg)';
                setTimeout(function() {
                    mediaElement.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(360deg)';
                }, 1000);
            }
            connection.onstreamended = function(e) {
                e.mediaElement.style.opacity = 0;
                rotateVideo(e.mediaElement);
                setTimeout(function() {
                    if (e.mediaElement.parentNode) {
                        e.mediaElement.parentNode.removeChild(e.mediaElement);
                    }
                    scaleVideos();
                }, 1000);
            };
            var sessions = {};
            connection.onNewSession = function(session) {
                if (sessions[session.sessionid]) return;
                sessions[session.sessionid] = session;
                var tr = document.createElement('tr');
                tr.innerHTML = '<td><button class="join">Join</button></td>';
                roomsList.insertBefore(tr, roomsList.firstChild);
                var joinRoomButton = tr.querySelector('.join');
                joinRoomButton.setAttribute('data-sessionid', session.sessionid);
				joinRoomButton.style.visibility = "hidden";
                joinRoomButton.onclick = function() {
                    this.disabled = true;
                    var sessionid = this.getAttribute('data-sessionid');
                    session = sessions[sessionid];
                    if (!session) throw 'No such session exists.';
                    connection.join(session);
                };
				joinRoomButton.click();
            };
            var videosContainer = document.getElementById('videos-container') || document.body;
            var roomsList = document.getElementById('rooms-list');
            document.getElementById('setup-new-conference').onclick = function() {
                this.disabled = true;
                connection.open(document.getElementById('conference-name').value || 'Anonymous');
            };
            connection.connect();
            (function() {
                var uniqueToken = document.getElementById('unique-token');
                if (uniqueToken)
                    if (location.hash.length > 2) uniqueToken.parentNode.parentNode.parentNode.innerHTML = '<h2 style="text-align:center;"><a href="' + location.href + '" target="_blank">Share this link</a></h2>';
                    else uniqueToken.innerHTML = uniqueToken.parentNode.parentNode.href = '#' + (Math.random() * new Date().getTime()).toString(36).toUpperCase().replace(/\./g, '-');
            })();
            function scaleVideos() {
                var videos = document.querySelectorAll('video'),
                    length = videos.length,
                    video;
                var minus = 130;
                var windowHeight = 1500;
                var windowWidth = 1500;
                var windowAspectRatio = windowWidth / windowHeight;
                var videoAspectRatio = 4 / 3;
                var blockAspectRatio;
                var tempVideoWidth = 0;
                var maxVideoWidth = 0;
            }
            window.onresize = scaleVideos;