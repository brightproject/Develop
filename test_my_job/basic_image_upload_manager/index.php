<?php
	$id = '123456';
	
	require('includes/db_connect.php');
	require('includes/json.php');
	
	$json = new Services_JSON;
	
	$r = mysql_query("SELECT * FROM images WHERE poster_id=$id ORDER BY number") or die(mysql_error());
	$data_array = array();
	
	for ($i=0; $row = mysql_fetch_assoc($r); $i++) {
		$t = (object) NULL;
		$t->description = $row['description'];
		$t->filename = $row['filename']. '_thumb.'.$row['extension'];
		$t->id = $row['id'];
		$data_array[] = $t;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
  <head>
    <script src="js/ScriptSing.js" type="text/javascript"></script>
    <script src="js/LightLoader.js" type="text/javascript"></script>

    <script type="text/javascript">
      // <![CDATA[
      ss.add_listener(window, 'load', function() {add_new_uploader(3, <?php echo $json->encode($data_array); ?>);});

      var counter = 0;
      var maxUploads = 10;

      function add_new_uploader(times, data) {
        times = parseInt(times, 10) || 1;
        var form = $s('the_form');
		
		if (data && data instanceof Array) {
          times += data.length;
          var add_data = true;
        }
        
        for (var i=0; i < times; i++) {
          if (counter == maxUploads) return;

          // Make a new div and append to form...
          var div = ss._('div');
          div.className = 'uploader_div';
          form.appendChild(div);
          div.style.width = '22em';
          div.style.paddingBottom = div.style.paddingTop = '1em';
          div.style.clear = 'both';

          // Make the file upload thingy
          var fileupload = ss._('input');
          fileupload.setAttribute('type', 'file');

          var progress_bar = create_progress_bar();

          // Create the LightLoader object and add the file input and progress bar
          var up = new LightLoader('images[]', form, 'upload_t.cgi', 'progress.php');
          up.set_file_input(fileupload);
          up.set_progress_bar(progress_bar);
          if (add_data && data[i]) {
          	up.already_uploaded = true;
          	up.db_id = data[i].id;
          }

          // Add some listeners
          up.onload = display_thumbnail;
          up.onerror = on_error;


          // Make the image tag and assign to the uploader object for easier referencing later on.
          var img = ss._('img');
          ss.extend(img, ss.vis.extensions);
          img.set_style('float', 'right');
          img.set_style('clear', 'both');
          if (add_data && data[i]) {img.src = 'temp_thumb.php?image=' + data[i].filename + '&perm_image=1&' + new Date().getTime();}
          else {img.src= 'noimage.jpg';}
          up.thumb = img; // For easier reference in display_thumbnail();

          // Make the comments text box
          var txt = ss._('textarea');
          txt.name = 'comments[]';
          txt.style.width = '100%';
          txt.style.height = '6em';
          if (add_data && data[i]) {txt.innerHTML = data[i].description;}
          
          // Make the "remove" link
          var rm = ss._('a');
          rm.innerHTML = 'Remove';
          rm.up_id = up.id;
          rm.href = '#';
          rm.onclick = function() { 
          	if (confirm('Are you sure you want to remove this picture?')) {
          		LightLoader.prototype.remove(this.up_id);
          		this.parentNode.parentNode.removeChild(this.parentNode);
          	}
          	return false;
          };
          
          // Attach everything to the DIV
          div.appendChild(img);
          div.appendChild(progress_bar);
          div.appendChild(fileupload);
          div.appendChild(ss._('br'));
          div.appendChild(txt);
          div.appendChild(ss._('br'));
          div.appendChild(rm);

          counter++;
        }
      }

      function on_error(err_msg) {
        alert(err_msg);
        this.thumb.src = 'noimage.jpg';
      }

      function display_thumbnail() {
        // The getTime part of the URL will always make sure that the browser reloads the image.
        now = new Date();
        this.thumb.src = 'temp_thumb.php?image=' + this.tmp_name + '&' + now.getTime();
      }

      function create_progress_bar() {
        var p_cont = ss._('div');
        // If you roll your own progress bar, make sure you assign a function with this name to it!
        p_cont.update_progress = function(info) {
          var p_bar = this.getElementsByTagName('div')[0];
          p_bar.set_style('width', info.percent + '%');
        };
        ////////////////////////////////////////
        ss.extend(p_cont);

        p_cont.set_style('position', 'relative');
        p_cont.set_style('height', '1em');
        p_cont.set_style('width', '200px');
        p_cont.set_style('background-color', '#cccccc');
        p_cont.innerHTML = '&nbsp;';

        var p_bar = p_cont.cloneNode(false);
        ss.extend(p_bar);
        p_bar.set_style('float', 'none');
        p_bar.set_style('position', 'absolute');
        p_bar.set_style('top', 0);
        p_bar.set_style('bottom', 0);
        p_bar.set_style('width', 0);
        //p_bar.set_style('background-image', 'progress_bg.jpg');
        p_bar.set_style('background-color', '#33ff33');

        p_cont.appendChild(p_bar);
        return p_cont;
      }
      // ]]>
    </script>
  </head>
  <body class="stuff">

<form action="poster.php" method="post" target="something" id="the_form">
  <script type="text/javascript">document.write('<a href="javascript:add_new_uploader();">Add another field<'+'/a><br/>');</script>
  <noscript>
    <!-- put your non-javascript version here -->
  </noscript>
  <input type="submit"/>
</form>



<iframe name="something" style="width: 100%; height: 20em;"></iframe>


</body>
</html>
