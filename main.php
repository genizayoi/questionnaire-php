<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Questionnaire" />
    <title>Survey</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/nixyannco.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="theme.css" type="text/css">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Questionnaire</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#Custom link1">Custom link1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Custom link2">Custom link2</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <h class="navbar-brand" href="#">Questionnaire</h>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#Custom link1">Custom link1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Custom link2">Custom link2</a>
                    </li>

			
                </ul>
            </div>
        </div>
    </nav>
    <div class="text-center filter-dark" style="background-image: url('images/58225609_p0.png');background-size:cover;background-position:center center;" id="annnai">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
<?php
$random_seed = (empty($_POST['random_seed']))?rand(1000000, 9999999):$_POST['random_seed'];
if(empty($_POST['submit1']))
{
	if(empty($_POST['submit2']))
	{

?>

 <form method="post">
                        <div class="form-group">
                            <label>Text1</label>
                            <input name="a" value="<?php if(!empty($_POST['a']))print $_POST['a'];?>" type="text" class="form-control" id="FormControlInput1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Text2</label>
                            <select name="b" class="form-control" id="FormControlSelect1">
                                <option><?php (!empty($_POST['b']))?print $_POST['b']:print "A";?></option>
                                <option><?php (!empty($_POST['b'])&&$_POST['b']=="B")?print "A":print "B";?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Text3 (Random seed = <?php print $random_seed;?>)</label>
                            <textarea name="c" class="form-control" id="FormControlTextarea1" rows="3"><?php if(!empty($_POST['c']))print $_POST['c'];?></textarea>
                        </div>
                    
                        <div class="form-group">
                            <input name="random_seed" value="<?php print $random_seed;?>" type="hidden">
                            <button type="submit" name="submit1" value="submit1" class="btn btn-light btn-lg btn-block">Submit</button>
                        </div>

                    </form>
<?php
    if(!file_exists("article.csv")){
}else{
?>
<label></label>
<table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 19%;">Text1</th>
                                <th style="width: 7%;">Text2</th>
                                <th style="width: 74%;">Text3</th>
                            </tr>
                        </thead>
                        <tbody>

<?php
$ACount=0;
$BCount=0;
$file=fopen("article.csv","r");
if($file)
{
	while($line=fgetcsv($file)){
		print "<tr><td>".($line[0]==""?"Null":$line[0])."</td><td class=\"bg-".($line[1]=="A"?"info":"danger")."\">".$line[1]."</td><td>".($line[2]==""?"Null":$line[2])."</td></tr>";
		$line[1]=="A"?$ACount++:$BCount++;
	}
}
fclose($file);
?>
</tbody>
                    </table>
		 <label class=""><?php print "Count<h2 style=\"display: inline;\" class=\"bg-success\">&nbsp".($ACount+$BCount)."&nbsp</h1>&nbsp&nbsp&nbsp(>_<)A<h2 style=\"display: inline;\" class=\"bg-info\">&nbsp".$ACount."&nbsp</h2>&nbsp&nbsp&nbsp(>_<)B<h2 style=\"display: inline;\" class=\"bg-danger\">&nbsp".$BCount."&nbsp</h2>"; ?></label>

<?php

}
	}else
	{
		$input_array=array($_POST['a'],$_POST['b'],"[".$_POST['random_seed']."] -> ".$_POST['c']);
		$fp=fopen("article.csv","a");
		fputcsv($fp,$input_array);
		fclose($fp);
?>

              <form method="post">
             <div class="form-group">
                           <label class="h4">Completed</label>
                        </div>
                    
                        <div class="form-group">

                            <button type="submit" name="submit4" value="submit4" class="btn btn-light btn-lg btn-block">Go Top</button>
                        </div>

                    </form>

<?php
	}
}
else
{
?>
<form method="post">
    
                            
    
           <fieldset disabled>
                     <div class="form-group">
                            <label for="exampleFormControlInput1">Text1</label>
                            <input value="<?php (!empty($_POST['a']))?print $_POST['a']:print "Null";?>" type="text" class="form-control" id="FormControlInput1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Text2</label>
                            <select class="form-control" id="FormControlSelect1">
                                <option><?php if(!empty($_POST['b']))print $_POST['b'];?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Text3 (Random seed = <?php print $random_seed;?>)</label>
                            <textarea class="form-control" id="FormControlTextarea1" rows="3"><?php (!empty($_POST['c']))?print $_POST['c']:print "Null";?></textarea>
                        </div>

                        <div class="form-group">
                           <label class="h4">Is that okay?</label>
                        </div>

             </fieldset>
<input name="a" value="<?php if(!empty($_POST['a']))print $_POST['a'];?>" type="hidden">
<input name="b" value="<?php if(!empty($_POST['b']))print $_POST['b'];?>" type="hidden">
<input name="c" value="<?php if(!empty($_POST['c']))print $_POST['c'];?>" type="hidden">
<input name="random_seed" value="<?php print $random_seed;?>" type="hidden">

  <div class="form-row">

    <div class="col">
     <button type="submit" name="submit2" value="submit2" class="btn btn-light btn-lg btn-block">Submit</button>

    </div>
    <div class="col">
     <button type="submit" name="submit3" value="submit3" class="btn btn-light btn-lg btn-block">Cancel</button>
    </div>
  </div>

</form>

<?php
}
?>

                </div>
            </div>
        </div>
    </div>

    <div class="bg-dark text-white p-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3 text-center">
                    <p class="">
                        © Copyright <a class="text-white" href="https://twitter.com/sohoelf" target="view_window">菓子困りました@sohoelf</a>
                        <br>2021/01/01 updated.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center bg-dark" style="">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" crossorigin="anonymous" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </div>
</body>

</html>