<!DOCTYPE html>
<html>
<head>
    <title>视频播放器</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK) {
            $videoFile = $_FILES['video']['tmp_name'];
            $videoName = $_FILES['video']['name'];
            $videoType = $_FILES['video']['type'];

            // 将视频文件移动到服务器上的指定位置
            $targetPath = 'videos/' . $videoName;
            move_uploaded_file($videoFile, $targetPath);

            // 显示视频播放器和功能按钮
            echo '<video id="player" controls>';
            echo '<source src="' . $targetPath . '" type="' . $videoType . '">';
            echo '</video>';

            echo '<div>';
            echo '<button onclick="playPause()">播放/暂停</button>';
            echo '<input type="range" id="speed" min="0.5" max="2.0" step="0.1" value="1.0" onchange="changeSpeed(this.value)">速度';
            echo '<input type="range" id="volume" min="0" max="1" step="0.1" value="1.0" onchange="changeVolume(this.value)">音量';
            echo '</div>';

            echo '<script>';
            echo 'var player = document.getElementById("player");';
            echo 'function playPause() {';
            echo '    if (player.paused) {';
            echo '        player.play();';
            echo '    } else {';
            echo '        player.pause();';
            echo '    }';
            echo '}';
            echo 'function changeSpeed(speed) {';
            echo '    player.playbackRate = speed;';
            echo '}';
            echo 'function changeVolume(volume) {';
            echo '    player.volume = volume;';
            echo '}';
            echo '</script>';
        }
    ?>
</body>
</html>
