<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Teste UEX </title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- Custom styles for this template -->
    <style>
        body {
            font-size: .875rem;
        }

        .feather {
            width: 16px;
            height: 16px;
            vertical-align: text-bottom;
        }

        /*
   * Sidebar
   */

        .sidebar {
            /* position: fixed; */
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            /* Behind the navbar */
            padding: 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }

        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 48px;
            /* Height of navbar */
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
        }

        .sidebar .nav-link .feather {
            margin-right: 4px;
            color: #999;
        }

        .sidebar .nav-link.active {
            color: #007bff;
        }

        .sidebar .nav-link:hover .feather,
        .sidebar .nav-link.active .feather {
            color: inherit;
        }

        .sidebar-heading {
            font-size: .75rem;
            text-transform: uppercase;
        }

        /*
   * Navbar
   */

        .navbar-brand {
            padding-top: .75rem;
            padding-bottom: .75rem;
            font-size: 1rem;
            background-color: rgba(0, 0, 0, .25);
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
        }

        .navbar .form-control {
            padding: .75rem 1rem;
            border-width: 0;
            border-radius: 0;
        }

        .form-control-dark {
            color: #fff;
            background-color: rgba(255, 255, 255, .1);
            border-color: rgba(255, 255, 255, .1);
        }

        .form-control-dark:focus {
            border-color: transparent;
            box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
        }

        /*
   * Utilities
   */

        .border-top {
            border-top: 1px solid #e5e5e5;
        }

        .border-bottom {
            border-bottom: 1px solid #e5e5e5;
        }

        .wallet {
            position: relative;
            right: 124px;
            top: 5px;
            height: 43px;
        }

        .wallet span {
            color: #fff;
            position: absolute;
            font-size: 25px;
            padding-left: 10px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 text-center">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
            <svg width="100" version="1.1" id="Camada_1" fill="currentColor" xmlns="https://www.w3.org/2000/svg"
                xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 420 170.9"
                style="enable-background:new 0 0 420 170.9;" xml:space="preserve" alt="Logo-UEX.IO">
                <g>
                    <path class="st0" d="M95.1,117.6c0,5.9-3.1,9.5-9.2,10.8c-10.3,2.1-22.5,3.1-36.8,3.1C21.7,131.4,8,120.1,8,97.4v-49
                    c0-8.1,3.9-12.2,11.8-12.2h8.6c3.7,0,5.5,1.8,5.5,5.5v52.6c0,5.8,1.3,9.6,3.9,11.5c2.2,1.5,6.3,2.2,12.3,2.2c9,0,15.4-0.4,19.2-1.2
                    V48.4c0-8.1,3.9-12.2,11.8-12.2h8.6c3.7,0,5.5,1.8,5.5,5.5V117.6z"></path>
                    <path class="st0" d="M284.3,126.1c0,3.1-1.8,4.6-5.5,4.6h-18c-3.2,0-5.4-1.3-6.7-3.8l-16.8-24.5l-17.1,24.7
                    c-1.7,2.4-4.2,3.6-7.5,3.6h-15.9c-3.7,0-5.5-1.5-5.5-4.6c0-1.1,0.6-2.7,1.9-4.8L222,82.6l-28.2-35.9c-2.5-2.5-2.4-6-2.4-6.4
                    c0.4-2.5,2.1-3.3,5.4-3.3h17.3c3.1,0,5.5,1.1,7.2,3.4l17,22.3l16.1-22.3c1.6-2.3,3.8-3.4,6.5-3.4h16.3c4,0,6,1.7,6,5.1
                    c0,1.8-1.2,3-2.1,4.5L254,81.4l28.6,39.9C283.7,123.4,284.3,125,284.3,126.1z"></path>
                    <g>
                        <path fill="#2ec7d6" class="st1" d="M309,102.6c9.7,0,14.6,4.9,14.6,14.6c0,9.8-4.9,14.8-14.6,14.8c-10.1,0-15.1-4.9-15.1-14.8
                      C293.9,107.5,299,102.6,309,102.6z"></path>
                        <path class="st0" d="M399.9,12.5c-8.1-7.8-20.6-11.7-37.4-11.7c-31.2,0-46.9,16.1-46.9,48.4c0,2.4,0.1,4.9,0.4,7.4
                      c2.3,26.8,17.4,40.4,45.3,40.7c0.3-7.4,0.8-15.1,2.8-19.3c1.3-2.6,3.1-5.1,4.9-7.3c-2,0.2-4.2,0.2-6.6,0.2
                      c-8.8,0-14.9-1.5-18.3-4.5c-0.4-0.3-0.7-0.7-1-1.1c-0.5-0.7-1-1.3-1.4-2c-1.8-3.3-2.7-8.1-2.7-14.3c0-6.6,1-11.6,2.9-14.9
                      c0.6-1.1,1.4-2,2.2-2.8c3.2-2.7,9.3-4.1,18.4-4.1c9.8,0,16.4,1.2,19.7,3.6c4.1,3,6.2,9.1,6.2,18.4c0,9.2-2.1,15.2-6.4,18.2
                      c0,0-7.5,6.2-11,13.4c-2.4,5-2.6,14.7-3,23.1c0,0.1,0,0.2,0,0.3h-29.6c-3.7,0-5.5,1.8-5.5,5.5v8.6c0,7.9,4.1,11.8,12.2,11.8h38.7
                      c3.7,0,5.5-1.8,5.5-5.5v-14.9c0-0.2,0-0.3,0-0.5c0,0,0,0,0,0c1.2-12.9,7-19.9,10.5-23.3c8.1-7.8,12.2-20,12.2-36.7
                      C412.1,32.5,408,20.3,399.9,12.5z"></path>
                    </g>
                    <path class="st0"
                        d="M148.8,35.2c-31.2,0-45.9,15.5-45.9,46.6c0,33.1,14.3,49.7,45,49.7c26.3,0.5,38.4-8.2,38.2-14.2l-0.3-8.4
                    c-0.7-3.7-2.3-5.1-5.7-5.1c-3.3-0.1-17.4,4.6-28.4,4.4c-11-0.1-15.2-2.4-18.4-6.5c-1.4-1.9-2.5-4.8-3.1-8.6
                    c1.5,0.8,13.3,2.6,22.7,2.2c23.3-2.1,33.7-7.1,36-24.3C191,53.7,180,35.2,148.8,35.2z M148.9,75.3c-2.3,0-13.8-0.6-19.1-1.4
                    c0-4.5,1.3-8.5,3.3-10.6c3.2-3.3,7.2-6.6,18-5.8c6.3-0.1,13,4.2,13,8.9C164.1,73,158.6,75.3,148.9,75.3z"></path>
                    <g>
                        <g>
                            <path class="st2" d="M19.8,162.6c-0.9,0.8-2.3,1.2-3.7,1.2c-3.4,0-5.3-1.9-5.3-5.3v-9.3H7.9v-2.5h2.9V143h3.1v3.7h4.8v2.5h-4.8
                        v9.1c0,1.8,1,2.8,2.6,2.8c0.9,0,1.7-0.3,2.4-0.8L19.8,162.6z"></path>
                            <path class="st2" d="M47.6,156.2H34c0.4,3,2.8,4.9,6.1,4.9c2,0,3.6-0.7,4.9-2l1.7,2c-1.5,1.8-3.8,2.7-6.6,2.7
                        c-5.4,0-9.1-3.6-9.1-8.6c0-5,3.6-8.6,8.5-8.6s8.3,3.5,8.3,8.7C47.7,155.5,47.7,155.9,47.6,156.2z M34,154h10.8
                        c-0.3-2.8-2.4-4.8-5.4-4.8C36.5,149.2,34.3,151.1,34,154z"></path>
                            <path class="st2" d="M59.9,155.2c0-5,3.7-8.6,8.9-8.6c3,0,5.5,1.2,6.9,3.6l-2.3,1.5c-1.1-1.7-2.7-2.4-4.6-2.4
                        c-3.3,0-5.8,2.3-5.8,5.9c0,3.7,2.5,5.9,5.8,5.9c1.8,0,3.5-0.8,4.6-2.4l2.3,1.5c-1.3,2.4-3.8,3.6-6.9,3.6
                        C63.6,163.8,59.9,160.2,59.9,155.2z"></path>
                            <path class="st2" d="M105,153.9v9.7h-3.1v-9.4c0-3.3-1.7-4.9-4.5-4.9c-3.2,0-5.3,1.9-5.3,5.6v8.7H89V140H92v9.1
                        c1.3-1.6,3.4-2.5,5.9-2.5C102.1,146.6,105,148.9,105,153.9z"></path>
                            <path class="st2" d="M141.7,145.3v1.5h4.9v2.5h-4.8v14.3h-3.1v-14.3h-2.9v-2.5h2.9v-1.5c0-3.3,2-5.4,5.6-5.4c1.3,0,2.6,0.3,3.4,1
                        l-0.9,2.3c-0.6-0.5-1.5-0.8-2.4-0.8C142.6,142.3,141.7,143.3,141.7,145.3z"></path>
                            <path class="st2" d="M157.2,155.2c0-5,3.7-8.6,8.8-8.6c5.1,0,8.7,3.6,8.7,8.6c0,5-3.7,8.6-8.7,8.6
                        C160.9,163.8,157.2,160.2,157.2,155.2z M171.7,155.2c0-3.6-2.4-5.9-5.7-5.9c-3.2,0-5.7,2.3-5.7,5.9c0,3.6,2.4,5.9,5.7,5.9
                        C169.2,161.1,171.7,158.8,171.7,155.2z"></path>
                            <path class="st2" d="M197.6,146.6v3c-0.3,0-0.5,0-0.7,0c-3.3,0-5.3,2-5.3,5.7v8.4h-3.1v-16.9h2.9v2.8
                        C192.5,147.6,194.6,146.6,197.6,146.6z"></path>
                            <path class="st2"
                                d="M245.3,146.7v14.6c0,5.9-3,8.7-8.7,8.7c-3.1,0-6.2-0.9-8-2.5l1.5-2.4c1.6,1.3,4,2.2,6.5,2.2
                        c4,0,5.8-1.8,5.8-5.7v-1.3c-1.5,1.7-3.7,2.6-6.1,2.6c-4.9,0-8.6-3.3-8.6-8.2c0-4.9,3.7-8.1,8.6-8.1c2.5,0,4.8,0.9,6.2,2.8v-2.6
                        H245.3z M242.3,154.7c0-3.3-2.4-5.5-5.8-5.5c-3.4,0-5.8,2.2-5.8,5.5c0,3.2,2.4,5.5,5.8,5.5C239.9,160.2,242.3,158,242.3,154.7z">
                            </path>
                            <path class="st2" d="M269.8,146.6v3c-0.3,0-0.5,0-0.7,0c-3.3,0-5.3,2-5.3,5.7v8.4h-3.1v-16.9h2.9v2.8
                        C264.7,147.6,266.8,146.6,269.8,146.6z"></path>
                            <path class="st2" d="M281.3,155.2c0-5,3.7-8.6,8.8-8.6c5.1,0,8.7,3.6,8.7,8.6c0,5-3.7,8.6-8.7,8.6
                        C285.1,163.8,281.3,160.2,281.3,155.2z M295.8,155.2c0-3.6-2.4-5.9-5.7-5.9c-3.2,0-5.7,2.3-5.7,5.9c0,3.6,2.4,5.9,5.7,5.9
                        C293.4,161.1,295.8,158.8,295.8,155.2z"></path>
                            <path class="st2" d="M337.7,146.7l-6.3,16.9h-2.9l-4.9-12.8l-4.9,12.8h-2.9l-6.3-16.9h2.9l4.9,13.4l5.1-13.4h2.6l5,13.5l5-13.5
                        H337.7z"></path>
                            <path class="st2" d="M360.2,162.6c-0.9,0.8-2.3,1.2-3.7,1.2c-3.4,0-5.3-1.9-5.3-5.3v-9.3h-2.9v-2.5h2.9V143h3.1v3.7h4.8v2.5h-4.8
                        v9.1c0,1.8,1,2.8,2.6,2.8c0.9,0,1.7-0.3,2.4-0.8L360.2,162.6z"></path>
                            <path class="st2" d="M389.5,153.9v9.7h-3.1v-9.4c0-3.3-1.7-4.9-4.5-4.9c-3.2,0-5.3,1.9-5.3,5.6v8.7h-3.1V140h3.1v9.1
                        c1.3-1.6,3.4-2.5,5.9-2.5C386.6,146.6,389.5,148.9,389.5,153.9z"></path>
                        </g>
                    </g>
                </g>
            </svg>
        </a>
        <div class="col-md-9">
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.index') }}">
                                <span data-feather="home"></span>
                                Contatos <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-danger" data-action="{{route('admin.AccontDelete')}}" href="#" data-title="Deletar Conta" data-description="Tem certeza que deseja deletar?" onclick="modalDelete(this)">
                                <span data-feather="trash"></span>
                                Deletar Conta
                            </a>
                        </li>
                    </ul>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login.logout') }}">
                                <span data-feather="file-text"></span>
                                Sair
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                @yield('content')
            </main>
        </div>
    </div>


    <!-- Bootstrap core JavaScript
      ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
        function modalDelete(param){
            var title = jQuery(param).attr('data-title');
            var description = jQuery(param).attr('data-description');
            var action = jQuery(param).attr('data-action');
            jQuery('#deletar').modal('show');
            jQuery('#deletar').on('shown.bs.modal', function (e) {
                jQuery(this).find('#form').attr('action',action);
                jQuery(this).find('#title').html(title);
                jQuery(this).find('.modal-body').html(description);
            })
            jQuery('#deletar').on('hidden.bs.modal', function (e) {
                // do something...
            })
        }
    </script>
  <div class="modal fade" id="deletar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white" id="title"></h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
            <form action="" method="post" id="form">
                @csrf
                @method('delete')
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-link">Sim</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>
