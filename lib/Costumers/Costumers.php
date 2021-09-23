<?php
class Costumers
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'id' => 'ID',
            'p_no' => 'Patient No',
            'name' => 'Name',
            'date' => 'Register Date',
            'age' => 'Age',
            'dob' => 'Date of birth',
            'gender' => 'Gender',
            'Blood' => 'Blood'
        ];

        return $ordering;
    }
}
?>
