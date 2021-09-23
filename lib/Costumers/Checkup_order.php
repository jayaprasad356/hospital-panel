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
            'patient_id' => 'Patient ID',
            'check_up_date' => 'Check up Date',
            'cause' => 'Cause',
            'weight' => 'Weight',
            'bp' => 'Bp',
            'pulse' => 'Pulse',
            'sugar' => 'Sugar',
            'doctor_name' => 'Doctor Name',
            'mobile' => 'Mobile',
            'test' => 'Test'
        ];

        return $ordering;
    }
}
?>
