<?php

     class Module{

        private $module_path; //Path del module
        private $module_name; //Nome del modulo

        /**
         * Costruttore
         */
        function  __construct($module){
           $this->module_path= "pages" . SEPARATOR . $module . SEPARATOR;
           $this->module_name= $module;

           $this->checkPhpExists();
        }

        /**
         * Controllo se il file php esiste, deve essere obbligatorio trovarne uno per farlo funzionare
         * 
         */
        function checkPhpExists(){
            $abstractPath= $this->module_path . $this->module_name . ".php";
            if(!file_exists($abstractPath)){
                throw new Exception('PHP file not found on module ' . $this->module_name);
            }
        }

        function getPhpFile(){
            return $this->module_path . $this->module_name . ".php";
        }

        /**
         * Controllo se il file Typescrit esiste, è opzionale
         */
        function checkTsExists(){
            $abstractPathTs= $this->module_path . $this->module_name . ".ts";
            $abstractPathJs= $this->module_path . $this->module_name . ".js";
            if(file_exists($abstractPathTs) && file_exists($abstractPathJs)){
                return $abstractPathJs;    
            }            
        }
        /**
         * Controllo se il file Css esiste, è opzionale
         */
        function checkCssExists(){
            $abstractPath= $this->module_path . $this->module_name . ".css";
            if(file_exists($abstractPath)){
                return $abstractPath;
            }
        }

    }