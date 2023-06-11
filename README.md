# PHP-VideoPlayer
Web服务器端视频播放器
<!DOCTYPE html>：这是文档类型声明，指定所使用的 HTML 版本。

<html>：根 HTML 元素的起始标签。

<head>：头部部分的起始标签，包含元数据和脚本引用。

<title>视频播放器</title>：设置网页在浏览器选项卡中显示的标题为"视频播放器"。

<body>：主体部分的起始标签，包含网页的可见内容。

<h1>选择视频文件</h1>：创建一个标题元素 (h1)，显示文本"选择视频文件"，提示用户选择视频文件。

<form action="videoPlayer.php" method="post" enctype="multipart/form-data">：创建一个表单元素。

action="videoPlayer.php"：指定表单数据提交的 URL 或文件名为videoPlayer.php。
method="post"：指定提交表单时使用的 HTTP 方法为 POST。
enctype="multipart/form-data"：指定在提交文件时如何对表单数据进行编码。
<input type="file" name="video" accept="video/*" required>：创建一个输入元素，用于选择视频文件。

type="file"：指定输入类型为文件上传。
name="video"：将文件输入字段命名为"video"，在服务器上用于访问上传的文件。
accept="video/*"：限制文件选择只能是视频文件。
required：指定文件输入字段为必填项，在提交表单前必须填写。
<input type="submit" value="确定">：创建一个输入元素，用作提交按钮。

type="submit"：指定输入类型为提交按钮。
value="确定"：将提交按钮上显示的文本设置为"确定"。
</form>：表单元素的结束标签。

</body>：主体部分的结束标签。

</html>：根 HTML 元素的结束标签。
  
  <?php：这是 PHP 代码的起始标记。
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['video']) && $_FILES['video']['error'] === UPLOAD_ERR_OK)：检查表单是否以 POST 方法提交，是否存在名为 "video" 的文件字段，并且上传过程中没有错误发生。
$videoFile = $_FILES['video']['tmp_name']：将上传的视频文件的临时路径保存到 $videoFile 变量中。
$videoName = $_FILES['video']['name']：将上传的视频文件的原始文件名保存到 $videoName 变量中。
$videoType = $_FILES['video']['type']：将上传的视频文件的 MIME 类型保存到 $videoType 变量中。
// 将视频文件移动到服务器上的指定位置：这是一条注释，解释了下一行代码的目的。
$targetPath = 'videos/' . $videoName：指定将视频文件移动到服务器上的位置，并生成目标路径。
move_uploaded_file($videoFile, $targetPath)：将上传的视频文件从临时路径移动到服务器上的目标路径。

// 显示视频播放器和功能按钮：这是一条注释，解释了下面的代码块的目的。
echo '<video id="player" controls>';：输出 HTML 代码来创建具有指定 ID 和控件属性的视频播放器元素。
echo '<source src="' . $targetPath . '" type="' . $videoType . '">';：输出 HTML 代码来创建 <source> 元素，指定视频播放器的源文件路径和 MIME 类型。
echo '</video>';：输出 HTML 代码来关闭视频播放器标签。
echo '<div>';：输出 HTML 代码来创建一个 <div> 元素。
echo '<button onclick="playPause()">播放/暂停</button>';：输出 HTML 代码来创建一个按钮，当点击时触发 playPause() 函数，用于播放/暂停视频。
echo '<input type="range" id="speed" min="0.5" max="2.0" step="0.1" value="1.0" onchange="changeSpeed(this.value)">速度';：输出 HTML 代码来创建一个滑动条输入框，用于调整视频播放速度，并指定相应的 changeSpeed() 函数。
echo '<input type="range" id="volume" min="0" max="1" step="0.1" value="1.0" onchange="changeVolume(this.value)">音量';：输出 HTML 代码来创建一个滑动条输入框，用于调整视频音量，并指定相应的 changeVolume() 函数。
echo '</div>';：输出 HTML 代码来关闭 <div> 元素标签。
echo '<script>';：输出 JavaScript 代码的起始标签。
echo 'var player = document.getElementById("player");';：定义 JavaScript 变量 player，获取具有指定 ID 的视频播放器元素。
echo 'function playPause() {';：定义名为 playPause() 的 JavaScript 函数。
echo ' if (player.paused) {';：检查视频是否暂停。
echo ' player.play();';：播放视频。
echo ' } else {';：如果视频正在播放。
echo ' player.pause();';：暂停视频。
echo '}';：结束 if-else 代码块。
echo 'function changeSpeed(speed) {';：定义名为 changeSpeed() 的 JavaScript 函数，用于改变视频播放速度。
echo ' player.playbackRate = speed;';：设置视频播放速度。
echo '}';：结束 changeSpeed() 函数。
echo 'function changeVolume(volume) {';：定义名为 changeVolume() 的 JavaScript 函数，用于改变视频音量。
echo ' player.volume = volume;';：设置视频音量。
echo '}';：结束 changeVolume() 函数。
echo '</script>';：输出 JavaScript 代码的结束标签。
最后，<?php 表示 PHP 代码的结束标记。
