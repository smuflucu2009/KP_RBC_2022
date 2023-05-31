<!DOCTYPE html>
<html>
  <head>
    <title>Test Layout</title>
    <style type="text/css">
        body, html
        {
            margin: 0; padding: 0; height: 100%; overflow: hidden;
        }

        #content
        {
            position:absolute; left: 0; right: 0; bottom: 0; top: 0px;
        }
    </style>
  </head>
  <body>
    <div id="content">
    <iframe src="{{ asset('storage/' . $record->file)}}#toolbar=0" width="100%" height="100%">
    </div>
    </iframe>
  </body>
</html>
