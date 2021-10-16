<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Title</title>
    <meta http-equiv="content-language" content="en-us" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="Author Name Goes Here" />
    <meta name="design" content="Sadhana Ganapathiraju" />
    <meta name="copyright" content="Copyright Goes Here" />
    <meta name="description" content="Description Goes Here" />
    <meta name="keywords" content="And, Finally, Keywords Go Here." />
    <link rel="start" title="Home" href="http://www.sixpence.com/" />
    <link rel="stylesheet" type="text/css" media="screen" href="../web_1_project/views/style/screen.css" />
    <!--[if lt ie 7]><link rel="stylesheet" type="text/css" media="screen" href="../web_1_project/views/style/ie-win.css" /><![endif]-->
</head>
    <body>
    <header>
        <div id="navigation">
            <ul>
                <li id="home"><a href="index.php?action=home">Exploration</a></li>
                <li id="ideas"><a href="index.php?action=ideas">Idée Populaire</a></li>
<!--                <li id="status"><a href="index.php?action=status">Statut</a></li>-->
                <li id="profile"><a href="index.php?action=profile">Profile</a></li>
                <?php if(isset($_SESSION['admin']) && $_SESSION['admin']){ ?>
                <li id="admin_members"><a href="index.php?action=admin_members">Les membres</a> </li>
                <li id="admin_ideas"><a href="index.php?action=admin_ideas">Les idées</a></li>
                <?php } ?>
                <li id="search_bar"><input type="text" placeholder="Search.." name="search_bar"></li>
                <li id="add_idea"><a href="index.php?action=add_idea">Ajouter une idée</a></li>
                <li><a href="index.php?action=logout">Deconnexion</a> </li>
            </ul>
        </div>
    </header>
