<?php 


class Alpha 
{
    public static function getClassname() 
    {
        echo __CLASS__;
    }

    public static function printClass() 
    {
        var_dump(get_called_class());
    }
}

class Beta extends Alpha 
{
    public static function getClassname() 
    {
        echo __CLASS__;
    }
}

Beta::printClass();
// Alpha::printClass();

// Alpha
