<?php

/**
 * @copyright	Copyright (C) 2010 Michael Richey. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
// no direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

class plgSystemExpiresHeaders extends JPlugin {

    private $app;
    private $site = false;
    private $expireInfo = null;
    private $itemid = null;
    private $activeitem = null;
    private $defaultitem = null;
    private $expired = false;
    private $itemrules = array();
    private $defaultrules = array();

    function __construct(&$subject, $config = array()) {
        parent::__construct($subject, $config);
        $this->app = JFactory::getApplication();
        if($this->site = $this->app->isSite()) {
            $this->activeitem = $this->app->getMenu()->getActive();
            $this->defaultitem = $this->app->getMenu()->getDefault();
            $this->itemid = $this->activeitem?$this->activeitem->id:null;
	    
            $this->getDefaults();
        }
    }
    function onAfterInitialise() {
        if ($this->site && $this->itemid) {
            $this->calcExpire();
            $this->expire($this->expireInfo);
        }
    }

    function onAfterDispatch() {      
        if ($this->site && !$this->expireInfo && !$this->expired) {
            $this->activeitem = $this->app->getMenu()->getActive();
            $this->itemid = $this->activeitem?$this->activeitem->id:null;
            $this->calcExpire();
            $this->expire($this->expireInfo);
        }
    }

    function onAfterRender() {       
        if ($this->site) {
            if(!$this->expired) {
                $this->expire($this->expireInfo);
            }
        }
    }

    function calcExpire() {
        // only operate in the site
        if ($this->app->isAdmin()) return;
	
        
            if($this->defaultrules['expires']) {
                $this->expireInfo = $this->defaultrules;
            }	
        
    }

    function expire($vars) {
        if (!$vars) {
	    return null;
	}
        if ($vars['expires']) {
            $date = new DateTime();
	    $date->setTimezone(new DateTimeZone('GMT'));
            $expireheader = $date->setTimestamp($vars['time'])->format('D, d M Y H:i:s T');
            $this->app->allowCache(true);
            $this->app->setHeader('Expires', $expireheader,true);
        }
        if ($vars['cachecontrol']) {
	    $this->cacheControlHeader($vars);
        }
        if ($vars['pragma'] && $vars['publicprivate'] == 2) {
            $this->app->setHeader('Pragma', 'no-cache');
        }
        $this->expired = true;
        return true;
    }
    
    function cacheControlHeader($vars) {
	$valuearray = array();
	switch ($vars['publicprivate']) {
	    case 0: $valuearray[] = 'public';
		break;
	    case 1: $valuearray[] = 'private';
		break;
	    case 2: $valuearray[] = 'no-cache';
		break;
	}
	
	$ppns = ($vars['publicprivate'] < 2 && $vars['nostore'] != 1)?$vars['seconds']:'0';
	$valuearray[] = 'max-age=' . $ppns;
	$valuearray[] = 'pre-check=' . $ppns;
	$valuearray[] = 'post-check=' . $ppns;
	
	if ($vars['nostore']) {
	    $valuearray[] = 'no-store';
	}
	if ($vars['mustrevalidate']) {
	    $valuearray[] = 'must-revalidate';
	}

	$this->app->setHeader('Cache-Control', implode(',', $valuearray));	
    }

    function getItemid() {
        return $this->activeitem?$this->activeitem->id:$this->defaultitem->id;
    }
    
    
    function getDefaults(){
        $data = array();
        $fields = array(
            'defaultexpires'=>0,
            'defaultexpireslength'=>2,
            'defaultexpiresinterval'=>'hour',
            'defaultcachecontrol'=>1,
            'defaultpublicprivate'=>0,
            'defaultnostore'=>'',
            'defaultmustrevalidate'=>'',
            'defaultpragma'=>''
        );
        foreach($fields as $varname=>$default) {
	    $key = str_replace('default','',$varname);
            $data[$key] = $this->params->get($varname,$default);
        }
        $this->defaultrules=$this->itemvars($data);
    }
    function itemvars($data) {
        $ret = array();
        $ret['expires']=(bool)$data['expires'];
        $ret['time'] = strtotime('+' . $data['expireslength'] . ' ' . $data['expiresinterval']);
        $ret['seconds'] = $ret['time'] - time();
        $ret['expireslength'] = (int) $data['expireslength'];
        $ret['expiresinterval'] = $data['expiresinterval'];
        $ret['cachecontrol'] = (bool) $data['cachecontrol'];
        $ret['nostore'] = (array_key_exists('nostore',$data) && $data['nostore'] == '1') ? true : false;
        $ret['mustrevalidate'] = (array_key_exists('mustrevalidate',$data) && $data['mustrevalidate'] == '1') ? true : false;
        $ret['publicprivate'] = (int) $data['publicprivate'];
        $ret['pragma'] = (array_key_exists('pragma',$data) && $data['pragma'] == '1') ? true : false;
        return $ret;
    }
}
