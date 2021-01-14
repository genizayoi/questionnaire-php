<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Questionnaire" />
    <title>Questionnaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/nixyannco.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="theme.css" type="text/css">
    <link rel="stylesheet" href="https://www.jaist.ac.jp/~s1910092/css/yinghua2.css">
    <link rel="stylesheet" href="APlayer.min.css">
</head>

<body>
	<div class="cherry"><img id="yinghua" src="https://www.jaist.ac.jp/~s1910092/images/yinghua.png" alt=""></div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Questionnaire</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://github.com/sohoelf/NegativeHarmony">GroupA - Negative Harmony</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://github.com/sohoelf/constraint-transformer-bach">GroupB - Transformer</a>
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
                        <a class="nav-link" target="_blank" href="https://github.com/sohoelf/NegativeHarmony">GroupA - Negative Harmony</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" target="_blank" href="https://github.com/sohoelf/constraint-transformer-bach">GroupB - Transformer</a>
                    </li>

			
                </ul>
            </div>
        </div>
    </nav>
    <div class="text-center filter-dark" style="background-image: url('images/58225609_p0.png');background-size:cover;background-position:center center;" id="annnai">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-12">
<?php
$seed = (empty($_GET['seed']))?((empty($_POST['seed']))?rand(1000000, 9999999):$_POST['seed']):(is_numeric($_GET['seed'])?$_GET['seed']: intval((hexdec(substr(md5($_GET['seed']),0,8)))/1000));
srand($seed);
$q1_group_count = (empty($_GET['q1count']))?4:$_GET['q1count'];
$q2_group_count = (empty($_GET['q2count']))?2:$_GET['q2count'];
$q1_group_array = array();
$q2_group_array = array();
for ($i = 1; $i <= $q1_group_count; $i++) {    
    $random_position = range (1,4);
    $random_piece = range (1,141); 
    shuffle ($random_position); 
    shuffle ($random_piece);
    for ($j = 0;$j<4;$j++)
    {
        switch ($random_position[$j]){
            case 1: 
                $random_position[$j]='O';
                break;
            case 2:
                $random_position[$j]='N';
                break;
            case 3:
                $random_position[$j]='N+';
                break;
            case 4:
                $random_position[$j]='N+part';
                break;
        }
        
    }
    array_push($q1_group_array,array($random_position,$random_piece));
    #print $q1_group_array[0][0][0];
}
for ($i = 1; $i <= $q2_group_count; $i++) {    
    $random_position = range (1,4);
    $random_piece = range (1,15); 
    shuffle ($random_position); 
    shuffle ($random_piece);
    for ($j = 0;$j<4;$j++)
    {
        switch ($random_position[$j]){
            case 1: 
                $random_position[$j]='o128';
                break;
            case 2:
                $random_position[$j]='n128';
                break;
            case 3:
                $random_position[$j]='o256';
                break;
            case 4:
                $random_position[$j]='n128o128';
                break;
        }
        
    }
    array_push($q2_group_array,array($random_position,$random_piece));
    #print $q1_group_array[0][0][0];
}
shuffle ($numbers); 
if(empty($_POST['submit1']))
{
	if(empty($_POST['submit2']))
	{
                ?>
                    <form method="post" class="row">
                        <label>Please evaluate and combine the listening feelings of the four music pieces in each of the groups below.<br>
                            For example, if you feel that piece 1 is better than piece 2, piece 2 is better than piece 3, and piece 3 is better than piece 4, you should choose "1> 2> 3> 4".<br>
                            Once you have evaluated all the groups, please submit by pressing the Submit button.<br></label>
                        <?php
                        for ($i = 1; $i <= $q1_group_count; $i++) {        
                        ?>
                            <div class="form-group col-sm-4">
                                <label><br>Group A<?php print $i;?></label>
                                <div id="aplayer_q1_<?php print $i;?>" class="mb-1 mt-0"></div>
                                <select name="s_q1_<?php print $i;?>" class="form-control" id="FormControlSelect<?php print $i;?>">
                                    <option><?php (!empty($_POST['s_q1_'.(string)$i]))?print $_POST['s_q1_'.(string)$i]:print "Click me to select";?></option>
                                    <option>1>2>3>4</option>
                                    <option>1>2>4>3</option>
                                    <option>1>3>2>4</option>
                                    <option>1>3>4>2</option>
                                    <option>1>4>2>3</option>
                                    <option>1>4>3>2</option>
                                    <option>2>1>3>4</option>
                                    <option>2>1>4>3</option>
                                    <option>2>3>1>4</option>
                                    <option>2>3>4>1</option>
                                    <option>2>4>1>3</option>
                                    <option>2>4>3>1</option>
                                    <option>3>1>2>4</option>
                                    <option>3>1>4>2</option>
                                    <option>3>2>1>4</option>
                                    <option>3>2>4>1</option>
                                    <option>3>4>1>2</option>
                                    <option>3>4>2>1</option>
                                    <option>4>1>2>3</option>
                                    <option>4>1>3>2</option>
                                    <option>4>2>1>3</option>
                                    <option>4>2>3>1</option>
                                    <option>4>3>1>2</option>
                                    <option>4>3>2>1</option>
                               </select>
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        for ($i = 1; $i <= $q2_group_count; $i++) {        
                        ?>
                            <div class="form-group col-sm-4">
                                <label><br>Group B<?php print $i;?></label>
                                <div id="aplayer_q2_<?php print $i;?>" class="mb-1 mt-0"></div>
                                <select name="s_q2_<?php print $i;?>" class="form-control" id="FormControlSelect<?php print $i;?>">
                                    <option><?php (!empty($_POST['s_q2_'.(string)$i]))?print $_POST['s_q2_'.(string)$i]:print "Click me to select";?></option>
                                    <option>1>2>3>4</option>
                                    <option>1>2>4>3</option>
                                    <option>1>3>2>4</option>
                                    <option>1>3>4>2</option>
                                    <option>1>4>2>3</option>
                                    <option>1>4>3>2</option>
                                    <option>2>1>3>4</option>
                                    <option>2>1>4>3</option>
                                    <option>2>3>1>4</option>
                                    <option>2>3>4>1</option>
                                    <option>2>4>1>3</option>
                                    <option>2>4>3>1</option>
                                    <option>3>1>2>4</option>
                                    <option>3>1>4>2</option>
                                    <option>3>2>1>4</option>
                                    <option>3>2>4>1</option>
                                    <option>3>4>1>2</option>
                                    <option>3>4>2>1</option>
                                    <option>4>1>2>3</option>
                                    <option>4>1>3>2</option>
                                    <option>4>2>1>3</option>
                                    <option>4>2>3>1</option>
                                    <option>4>3>1>2</option>
                                    <option>4>3>2>1</option>
                               </select>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="form-group col-sm-12 mt-4">
                            <input name="seed" value="<?php print $seed;?>" type="hidden">
                            <button type="submit" name="submit1" value="submit1" class="btn btn-light btn-lg btn-block">Submit</button>
                        </div>

                    </form>
                <?php
        
	}else
	{
        $fp=fopen("data/".$seed.".csv","a");
        for ($i = 1; $i <= $q1_group_count; $i++) {
            if ($_POST['s_q1_'.$i]!="Click me to select"){
                $select_item_array = explode('>',$_POST['s_q1_'.$i]);
                
            }else{
                $select_item_array = explode('>',"1>2>3>4");
            }
            $input_array=array(date("Y/m/d H:i:s ").$_GET['seed'].' '.$seed,'A'.$i,
                $q1_group_array[$i-1][0][$select_item_array[0]-1],$q1_group_array[$i-1][1][0],
                $q1_group_array[$i-1][0][$select_item_array[1]-1],$q1_group_array[$i-1][1][0],
                $q1_group_array[$i-1][0][$select_item_array[2]-1],$q1_group_array[$i-1][1][0],
                $q1_group_array[$i-1][0][$select_item_array[3]-1],$q1_group_array[$i-1][1][0]);
            fputcsv($fp,$input_array);
        }
        for ($i = 1; $i <= $q2_group_count; $i++) {
            if ($_POST['s_q2_'.$i]!="Click me to select"){
                $select_item_array = explode('>',$_POST['s_q2_'.$i]);
                
            }else{
                $select_item_array = explode('>',"1>2>3>4");
            }
            $input_array=array(date("Y/m/d H:i:s ").$_GET['seed'].' '.$seed,'B'.$i,
                $q2_group_array[$i-1][0][$select_item_array[0]-1],$q2_group_array[$i-1][1][$select_item_array[0]-1],
                $q2_group_array[$i-1][0][$select_item_array[1]-1],$q2_group_array[$i-1][1][$select_item_array[1]-1],
                $q2_group_array[$i-1][0][$select_item_array[2]-1],$q2_group_array[$i-1][1][$select_item_array[2]-1],
                $q2_group_array[$i-1][0][$select_item_array[3]-1],$q2_group_array[$i-1][1][$select_item_array[3]-1]);
            fputcsv($fp,$input_array);
        }
        fclose($fp);
        

if(!file_exists("data/".$seed.".csv")){
        }else{
            ?>
                <label></label>
                <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 28%;">Time And Seed</th>
                                                <th style="width: 7%;">Group</th>
                                                <th style="width: 65%;">Your Answer</th>
                                            </tr>
                                        </thead>
                                        <tbody>

            <?php
            $ACount=0;
            $BCount=0;
            $file=fopen("data/".$seed.".csv","r");
            if($file)
            {
                while($line=fgetcsv($file)){
                    print "<tr><td>".($line[0]==""?"Null":$line[0])."</td><td class=\"bg-".(substr($line[1],0,1)=="A"?"info":"danger")."\">".$line[1]."</td><td>".
                        ('<b class="bg-success">'.$line[2].'</b>'.'['.$line[3].']'.'(<a href="pieces/'.$line[2].'/'.$line[3].'.mp3">mp3</a>/<a href="pieces/'.$line[2].'/'.$line[3].'.pdf">pdf</a>) > ').
                        ('<b class="bg-success">'.$line[4].'</b>'.'['.$line[5].']'.'(<a href="pieces/'.$line[4].'/'.$line[5].'.mp3">mp3</a>/<a href="pieces/'.$line[4].'/'.$line[5].'.pdf">pdf</a>) > ').
                        ('<b class="bg-success">'.$line[6].'</b>'.'['.$line[7].']'.'(<a href="pieces/'.$line[6].'/'.$line[7].'.mp3">mp3</a>/<a href="pieces/'.$line[6].'/'.$line[7].'.pdf">pdf</a>) > ').
                        ('<b class="bg-success">'.$line[8].'</b>'.'['.$line[9].']'.'(<a href="pieces/'.$line[8].'/'.$line[9].'.mp3">mp3</a>/<a href="pieces/'.$line[8].'/'.$line[9].'.pdf">pdf</a>)')
                        ."</td></tr>";
                    substr($line[1],0,1)=='A'?$ACount++:$BCount++;
                }
            }
            fclose($file);
            ?>
                </tbody>
                                    </table>
                        <label class=""><?php print "Count<h2 style=\"display: inline;\" class=\"bg-success\">&nbsp".($ACount+$BCount)."&nbsp</h1>&nbsp&nbsp&nbspGroup&nbspA<h2 style=\"display: inline;\" class=\"bg-info\">&nbsp".$ACount."&nbsp</h2>&nbsp&nbsp&nbspGroup&nbspB<h2 style=\"display: inline;\" class=\"bg-danger\">&nbsp".$BCount."&nbsp</h2>"; ?></label>

            <?php

            }?>
              <form method="post">
             <div class="form-group">
                           <label class="h4">Completed. Thank you very much!!!</label>
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
<form method="post" class="row">
    
                            
    
                    <?php
                    for ($i = 1; $i <= $q1_group_count; $i++) { ?>
                        <div class="form-group col-sm-4">
                            <label for="exampleFormControlInput1">Group A<?php print $i;?></label>
                        <fieldset disabled>
                            <input value="<?php (!empty($_POST['s_q1_'.(string)$i]))?print $_POST['s_q1_'.(string)$i]:print "Null";?>" type="text" class="form-control" id="FormControlInput<?php print $i;?>" placeholder="">
                        </fieldset>
                        </div>

                    <?php }?>
<?php
for ($i = 1; $i <= $q1_group_count; $i++) { ?>
<input name="s_q1_<?php print $i;?>" value="<?php if(!empty($_POST['s_q1_'.(string)$i]))print $_POST['s_q1_'.(string)$i];?>" type="hidden">
<?php }?>
                    <?php
                    for ($i = 1; $i <= $q2_group_count; $i++) { ?>
                        <div class="form-group col-sm-4">
                            <label for="exampleFormControlInput1">Group B<?php print $i;?></label>
                        <fieldset disabled>
                            <input value="<?php (!empty($_POST['s_q2_'.(string)$i]))?print $_POST['s_q2_'.(string)$i]:print "Null";?>" type="text" class="form-control" id="FormControlInput<?php print $i;?>" placeholder="">
                        </fieldset>
                        </div>

                    <?php }?>
<?php
for ($i = 1; $i <= $q2_group_count; $i++) { ?>
<input name="s_q2_<?php print $i;?>" value="<?php if(!empty($_POST['s_q2_'.(string)$i]))print $_POST['s_q2_'.(string)$i];?>" type="hidden">
<?php }?>
<input name="seed" value="<?php print $seed;?>" type="hidden">


    <label class="h4 col-sm-12 mb-5 mt-3">Are you sure you want to submit?</label>
    <div class="col">
     <button type="submit" name="submit2" value="submit2" class="btn btn-light btn-lg btn-block">Submit</button>

    </div>
    <div class="col">
     <button type="submit" name="submit3" value="submit3" class="btn btn-light btn-lg btn-block">Edit again</button>
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
		<script src="https://www.jaist.ac.jp/~s1910092/js/yinghua.js"></script>
		<script>
			$(function(){
				 $('.cherry').Cherry_Blossoms({
				 is_Cherry:true,
				 image_min:10,
				 image_max:20,
				 time_min:10000,
				 time_max:20000,
				 interval:600
				 })
			})
		</script>
        <script src="APlayer.min.js"></script>
		<script>
        <?php
        for ($i = 1; $i <= $q1_group_count; $i++) {?>
			const ap_q1_<?php print $i;?> = new APlayer({
				container: document.getElementById('aplayer_q1_<?php print $i;?>'),
                preload: 'metadata',
                mutex: true,
                listFolded: false,
				 audio:[
					{
						name:'Music piece 1',
						artist:'Hidden',
						url:'pieces/<?php print $q1_group_array[$i-1][0][0];?>/<?php print $q1_group_array[$i-1][1][0];?>c60.mp3',
						cover:'images/ms0.png'
					},
					{
						name:'Music piece 2',
						artist:'Hidden',
						url:'pieces/<?php print $q1_group_array[$i-1][0][1];?>/<?php print $q1_group_array[$i-1][1][0];?>c60.mp3',
						cover:'images/ms0.png'
                    },
					{
						name:'Music piece 3',
						artist:'Hidden',
						url:'pieces/<?php print $q1_group_array[$i-1][0][2];?>/<?php print $q1_group_array[$i-1][1][0];?>c60.mp3',
						cover:'images/ms0.png'
					},
					{
						name:'Music piece 4',
						artist:'Hidden',
						url:'pieces/<?php print $q1_group_array[$i-1][0][3];?>/<?php print $q1_group_array[$i-1][1][0];?>c60.mp3',
						cover:'images/ms0.png'
					},
				]
            });
        <?php }?>
        <?php
        for ($i = 1; $i <= $q2_group_count; $i++) {?>
			const ap_q2_<?php print $i;?> = new APlayer({
				container: document.getElementById('aplayer_q2_<?php print $i;?>'),
                preload: 'metadata',
                mutex: true,
                listFolded: false,
				 audio:[
					{
						name:'Music piece 1',
						artist:'Hidden',
						url:'pieces/<?php print $q2_group_array[$i-1][0][0];?>/<?php print $q2_group_array[$i-1][1][0];?>.mp3',
						cover:'images/ms0.png'
					},
					{
						name:'Music piece 2',
						artist:'Hidden',
						url:'pieces/<?php print $q2_group_array[$i-1][0][1];?>/<?php print $q2_group_array[$i-1][1][1];?>.mp3',
						cover:'images/ms0.png'
                    },
					{
						name:'Music piece 3',
						artist:'Hidden',
						url:'pieces/<?php print $q2_group_array[$i-1][0][2];?>/<?php print $q2_group_array[$i-1][1][2];?>.mp3',
						cover:'images/ms0.png'
					},
					{
						name:'Music piece 4',
						artist:'Hidden',
						url:'pieces/<?php print $q2_group_array[$i-1][0][3];?>/<?php print $q2_group_array[$i-1][1][3];?>.mp3',
						cover:'images/ms0.png'
					},
				]
            });
        <?php }?>
		</script>
    </div>
</body>

</html>