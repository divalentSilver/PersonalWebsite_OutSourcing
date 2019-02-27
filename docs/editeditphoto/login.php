<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../assets/css/admin.css" />
</head>

<body>
    <h2 class="title">You must be logged in as an administrator.</h2>
        <div class="login-page">
            <div class="form">
                <form class="login-form" action='auth.php' method='post'>
                    <input id='userId' type="text" name='userId' placeholder="id" />
                    <input id='password' type="password" name='password' placeholder="password" />
                    <button type='submit'>login</button>
                </form>
            </div>
        </div>
</body>
</html>
