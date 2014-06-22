<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../images/favicon.ico">

        <title>Online Assignment Submission</title>

        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/home.css" rel="stylesheet">
        <link href="../css/jquery.fileupload-ui.css" rel="stylesheet">
        <link href="../css/datetimepicker.css" media="screen" rel="stylesheet" type="text/css">
        <link href="../css/font-awesome.css" media="screen" rel="stylesheet" type="text/css">
        
        <!-- Just for debugging purposes. Don't actually copy this line! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Online Assignment Submission</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div><!-- /.nav-collapse -->
            </div><!-- /.container -->
        </div><!-- /.navbar -->

        <div class="container">



            <div class="col-xs-12">
                <p class="pull-right visible-xs">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                </p>
                <div class="well">
                    <h1>Hello, world!</h1>
                    <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
                </div>
               
                    <div class="col-lg-offset-11"><a class="btn btn-primary" href="addassignment.php">+ Assignment</a></div>
                    <table class="table table-hover course-table">
                        <tr>
                            <th>Assignment Name</th>		
                            <th>Last Date Of Submission</th>
                            <th>Questions File</th>
                            <th>Submissions</th>
                        </tr>
                        <tr>
                            <td>Jill</td>
                            <td>  15/06/2014</td>
                            <td><a href="#" class="btn btn-default" >View file</a></td>
                             <td><a href="#" class="btn btn-default" >View Submission</a></td>
                        </tr>
                        <tr>
                           <td>Jill</td>
                            <td>15/06/2014</td>
                            <td><a href="#" class="btn btn-default" >View file</a></td>
                            <td><a href="#" class="btn btn-default" >View Submission</a></td>
                        
                        </tr>
                        <tr>
                            <td>John</td>
                            <td>80</td>
                            <td><span class="btn btn-default fileinput-button add_attachment_btn ">
                                    <span>Select file...</span>
                                    <input id="fileupload" type="file" name="files">
                                </span></td>
                            <td><a href="./contact.php" class="btn btn-default" >upload</a></td>
                        </tr>


                    </table>
            </div><!--/span-->

            <!--/span-->


            <hr>

            <footer>
                <p>&copy; OAS 2014</p>
            </footer>

        </div><!--/.container-->



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/home.js"></script>
        <script src="../js/jquery.ui.widget.js"></script>
        <script src="../js/jquery.fileupload-ui.js"></script>
        <script src="../js/base.js"></script>
        <script src="../js/bootstrap-datetimepicker.js"></script>
    </body>
</html>


<link href="../css/datepicker.css" rel="stylesheet">
<script src="../js/bootstrap-datepicker.js"></script>
<!--<script src="../js/datepicker.less"></script> -->

<script>
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    arrivalPicker = $('#start-date').datepicker({
        onRender:function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate',function (ev) {
            arrivalPicker.hide();
        }).data('datepicker');
    $("#start-date-cal").click(function(){
        arrivalPicker.show();
    });
    
</script>