<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_custom
 *
 * @copyright   Copyright (C) 2005 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<style>
    body#careers-investors.com_zoo .blog-default .teaser-item .floatbox {margin-top:0;}
    #yoo-zoo .items p.pos-links {margin-top:10px;}
    #yoo-zoo .width50 {
        float: left;
        width: 49.999%;
    }
    .job-title,.pos-meta{margin-bottom:5px !important;}
    h1.job-title{font-size: 32.5px}

    @media screen and (max-width: 767px){
        #yoo-zoo .width50 {
            width: 100%;
        }
    }
</style>
<div id="yoo-zoo" class="yoo-zoo blog-default blog-default-frontpage">

	<div class="items items-col-2">
	<?php
    $arrUsed = array();
    foreach ($xml as $key => $job) {
        if($job->archived ==0 && $job->active ==1){
            $strKey = str_replace(' ','',$job->department_name);
            $job->jobimage = '';
            $arrNumbers[$strKey] = array(1,2,3,4,5,6);
            $blnFoundone = false;
            while (count($arrNumbers[$strKey]) > 0 && !$blnFoundone) {
                if(count($arrNumbers[$strKey])==1){
                    $arrUsed[$strKey] = array();
                    $arrNumbers[$strKey] = array(1,2,3,4,5,6);
                }
            	shuffle($arrNumbers[$strKey]);
            	$i=array_shift($arrNumbers[$strKey]);
                if(!in_array($i,$arrUsed[$strKey])){
            	   if(file_exists(JPATH_ROOT.'/modules/mod_eckoh_jobsfeed/img/'.$strKey.'-'.$i.'.jpg')){
            	       $job->jobimage = JURI::base().'modules/mod_eckoh_jobsfeed/img/'.$strKey.'-'.$i.'.jpg';
                       $arrUsed[$strKey][] = $i;
            	       $blnFoundone = true;
                	}
                }
            }
        }
	}
    $arrJobs = array();
	foreach ($xml as $key => $job) {
        $arrJobs[] = $job;
    }
	$arrJobs = array_reverse($arrJobs);
    foreach ($arrJobs as $key => $job) {

        $date = new DateTime($job->closing_date);
        $now = new DateTime();

        if($date < $now) {
            continue;
        }

	    if($job->archived ==0 && $job->active ==1){
    	    $strimage = '<img src="'.JURI::base().'modules/mod_eckoh_jobsfeed/img/ContactCentre-1.jpg" alt="'.$job->job_title.'" />';
    	    if($job->jobimage){
    	        $strimage = '<img src="'.$job->jobimage.'" alt="'.$job->job_title.'" />';
    	    }

    	?>

        	    <div class="width50 first" id="job<?php echo $job->id;?>" data-close="<?php echo $job->closing_date;?>">
                    <div class="teaser-item">
            	        <div class="teaser-item-bg">
            	            <div class="element element-image first last">
            	                <a title="<?php echo $job->job_title;?>" target="_blank" href="https://www.naturalhr.net/hr/recruitment/job/c447091548856f007af44714683a4de0/<?php echo $job->id;?>">
            	                    <?php echo $strimage;?>
            	                </a>
            	            </div>
                            <h1 class="pos-title job-title">
            	                <a title="<?php echo $job->job_title;?>" target="_blank" href="https://www.naturalhr.net/hr/recruitment/job/c447091548856f007af44714683a4de0/<?php echo $job->id;?>"><?php echo $job->job_title;?></a>
            	            </h1>
                            <p class="pos-meta"><?php echo $job->location;?></p>
                            <div class="floatbox">
            		            <div class="pos-content">
            		                <div class="element element-text first last">
            	                        <div class="details">
            	                            <?php if($job->go_live_date[0]){?>
                                		        <div><span>Posted:</span>&nbsp;<?php $date = new DateTime($job->go_live_date); echo $date->format('d/m/Y');?></div>
                                		    <?php }else{ ?>
                                		        <div><span>&nbsp;</span></div>
                                		    <?php } ?>
                                		    <?php if($job->salary_range[0]){?>
                                		        <div><span>Salary:</span>&nbsp;<?php echo $job->salary_range;?></div>
                                		    <?php }else{ ?>
                                		        <div><span>&nbsp;</span></div>
                                		    <?php } ?>

                                		</div>
            	                    </div>
            	                </div>
                            </div>
                            <p class="pos-links">
            	                <span class="element element-itemlink first last">
            	                    <a target="_blank" href="https://www.naturalhr.net/hr/recruitment/job/c447091548856f007af44714683a4de0/<?php echo $job->id;?>">Continue Reading</a>
            	                </span>
                            </p>
            		    </div>
                    </div>
                </div>

	    <?php
	    }
}
?>

</div>


</div>
