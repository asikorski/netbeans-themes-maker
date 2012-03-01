<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        //$config = new Zend_Config_Xml(THEMES_PATH.'/simple.xml');
        $config = simplexml_load_file(THEMES_PATH.'/simple.xml');
        $arrayConfig = array();
        foreach( $config->children() as $child ){
            //new Socms_Dump($child->getName());
            //$xmldata->attributes()->count() > 0
            //new Socms_Dump($child->attributes()->count());
            if($child->attributes()->count()>0){
                $attributeArray = array();
                foreach ($child->attributes() as $name => $attrib) {
                    $attributeArray[$name] = (string)$attrib;
                }
                $itemName = $attributeArray['name'];
                /**/
                if(!isset($attributeArray['bgColor'])){
                    $attributeArray['bgColor'] = false;   
                }
                if(!isset($attributeArray['foreColor'])){
                    $attributeArray['foreColor'] = false;   
                }
                unset($attributeArray['name']);
                $arrayConfig[$itemName] = $attributeArray;
                //new Socms_Dump($attributeArray);
            }
            
        }
        new Socms_Dump($arrayConfig);
            
       //. new Socms_Dump($config);
    }


}

