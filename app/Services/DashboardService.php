<?php
    namespace App\Services;

    use App\Services\IHash;

    class DashboardService implements IHash
    {
        /**
         * =============================================x
         * authentication hashless
         * =============================================x
         */
        public function manual($user, $data)
        {
            if($user->email !== $data['email'])
                array_push($msg, 'Invalid email');
            if($user->password !== $data['password'])
                array_push($msg, 'Invalid password');
            return $msg;
        }
    }
    