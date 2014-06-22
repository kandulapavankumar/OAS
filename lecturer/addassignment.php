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
                <div class="col-lg-offset-5">
                    <h3>New Assignment</h3>
                </div>
                <div class="col-lg-offset-4 col-md-4">
                    <form role="form">
                        <div class="form-group">
                            <label for="exampleAssignmentName">Assignment Name</label>
                            <input type="text" class="form-control" id="newAssignmentName" name="newAssignmentName" placeholder="Enter Assignment Name">
                        </div>
                        <div class="form-group" >
                            <label for="exampleAssignmentName">Last Submission Date</label>
                            <div class="input-control" style="position: relative">
                                <input type="text"
                                       class="form-control"
                                       id="start-date"
                                       name="period_start" placeholder="Period">
                                <span id="start-date-cal" class="cal glyphicon glyphicon-calendar" style="position: absolute; font-size: 25px;color: grey;margin-top: 3px;margin-left: 300px" type="button"></span>
                            </div>  
                        </div>
                        <div class="form-group">
                            <label for="exampleQuestions">Questions File</label>
                            <span class="btn btn-default fileinput-button add_attachment_btn ">
                                <span>Select file...</span>
                                <input id="fileupload" type="file" name="files">
                                
                            </span>
                            <ul id="selected-files">
                                    <!--File names will be displayed here-->
                                </ul>

                                <div id="progress" style="width: 250px">
                                    <div class="bar" style="width: 0%;"></div>
                                </div>
                            
                        </div
                         <div class="form-group" >
                             <input type="reset" class="form-control" >
                             <input type="submit" class="form-control" >
                         </div>  
                        </div>

                </div>  


                </form>
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
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        arrivalPicker.hide();
    }).data('datepicker');
    $("#start-date-cal").click(function() {
        arrivalPicker.show();
    });

</script>