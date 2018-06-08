
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<!-- <link rel="icon" href="../../../../favicon.ico"> -->

<title>Login</title>

<!-- Bootstrap core CSS -->
<link href="/assets/login/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
<!-- Custom styles for this template -->
<link href="/assets/login/signin.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                @include('admin.layouts.partials.alert-error')
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <form class="form-signin" method="post">
                @csrf
                <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputUsername" class="sr-only">Username</label>
                <input type="text" id="inputUsername" name="username" class="form-control input-username" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <div class="checkbox mb-3">
                <label>
                  <input type="checkbox" value="remember-me"> Remember me
                </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
    <!-- <script src="//code.jquery.com/jquery.js"></script> -->
    <!-- Bootstrap JavaScript -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
</body>
</html>