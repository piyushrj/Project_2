<?php

class my50
    {
        /**
         * Library's configuration.
         */
        private static $config;

        /**
         * Initializes library with JSON file at $path.
         */
        public static function init($path)
        {
            // ensure library is not already initialized
            if (isset(self::$config))
            {
                trigger_error("my50 Library is already initialized", E_USER_ERROR);
            }

            // ensure configuration file exists
            if (!is_file($path))
            {
                trigger_error("Could not find {$path}", E_USER_ERROR);
            }

            // read contents of configuration file
            $contents = file_get_contents($path);
            if ($contents === false)
            {
                trigger_error("Could not read {$path}", E_USER_ERROR);
            }

            // decode contents of configuration file
            $config = json_decode($contents, true);
            if (is_null($config))
            {
                trigger_error("Could not decode {$path}", E_USER_ERROR);
            }

            // store configuration
            self::$config = $config;
        }
        public static function query(/* $sql [, ... ] */)
        {
            // ensure library is initialized
            if (!isset(self::$config))
            {
                trigger_error("my50 Library is not initialized", E_USER_ERROR);
            }

            // ensure database is configured
            if (!isset(self::$config["database"]))
            {
                trigger_error("Missing value for database", E_USER_ERROR);
            }
             // SQL statement
            $sql = func_get_arg(0);

            // parameters, if any
            $parameters = array_slice(func_get_args(), 1);

            // try to connect to database
            static $con;
            if(!isset($conncet))
            {
                try
                {
                    $con=mysqli_connect(self::$config["database"]["host"],
                        self::$config["database"]["username"],
                        self::$config["database"]["password"],self::$config["database"]["name"]);
                    
                }
                catch (Exception $e)
                {
                    
                    trigger_error($e->getMessage(), E_USER_ERROR);
                }
            }
             // ensure number of placeholders matches number of values
            // http://stackoverflow.com/a/22273749
            // https://eval.in/116177
            $pattern = "
                /(?:
                '[^'\\\\]*(?:(?:\\\\.|'')[^'\\\\]*)*'
                | \"[^\"\\\\]*(?:(?:\\\\.|\"\")[^\"\\\\]*)*\"
                | `[^`\\\\]*(?:(?:\\\\.|``)[^`\\\\]*)*`
                )(*SKIP)(*F)| \?
                /x
            ";
            preg_match_all($pattern, $sql, $matches);
            if (count($matches[0]) < count($parameters))
            {
                trigger_error("Too few placeholders in query", E_USER_ERROR);
            }
            else if (count($matches[0]) > count($parameters))
            {
                trigger_error("Too many placeholders in query", E_USER_ERROR);
            }

            // replace placeholders with quoted, escaped strings
            $patterns = [];
            $replacements = [];
            for ($i = 0, $n = count($parameters); $i < $n; $i++)
            {
                array_push($patterns, $pattern);
                array_push($replacements, preg_quote(mysqli_real_escape_string($con,$parameters[$i])));
            }
            $query = preg_replace($patterns, $replacements, $sql, 1);//replace the placeholders
            
            $result=mysqli_query($con,$query);//perform the query
            if(!$result)
            {
                trigger_error("Error in query",E_USER_ERROR);
            }
            $fieldcount=mysqli_num_fields($result);//count the number of columns in the returned array
            //check if query was select
            if($fieldcount>0)
            {
                return (mysqli_fetch_all($result,MYSQLI_ASSOC));
            }
            else//if the query was INSET, DELETE or UPDATE
            {
                return $fieldcount;
            }
            

        }
    }