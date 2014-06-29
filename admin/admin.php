<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../images//favicon.ico">

        <title>Online Assignment Submission</title>

        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/home.css" rel="stylesheet">

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
                <div class="row">
                    <a href="uploaddata.php" style="float: left"  type="button"  class="btn bg-primary">Upload Profile data</a><a style="float: right"  type="button" class="btn bg-danger" href="#" onclick="movetonextsem()">Move to Next semester </a>
                </div><!--/row-->
                <div class="row">
                    <h4>Select Year and section to add Subjects</h4>
                    <form class="form-inline" role="form" action="subjects-linkup1.php"> 
                        <div class="form-group">
                            <label for="exampleInputYear">Year</label>
                            <select class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>


                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Section</label>
                            <select class="form-control">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                <option value="H">H</option>
                                <option value="I">I</option>
                                <option value="J">J</option>
                            </select>

                        </div>
                        <button type="submit" class="btn btn-default">Go...</button>
                    </form>
                </div><!--/row-->
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
        <script src="../js/bootbox.js"></script>
        <script>
                        function movetonextsem()
                        {
                            bootbox.dialog({
        message: "Are You sure you eant to move next semester",
        title: "Move to Next sem",
        buttons: {
            success: {
                label: "Cancel!",
                className: "btn-success",
                callback: function() {
                    Example.show("great success");
                }
            },
            danger: {
                label: "Move!",
                className: "btn-danger",
                callback: function() {
                    Example.show("uh oh, look out!");
                }
            },
            main: {
                label: "Click ME!",
                className: "btn-primary",
                callback: function() {
                    Example.show("Primary button");
                }
            }
        }
    });
                        }
        </script>
    </body>
</html>
