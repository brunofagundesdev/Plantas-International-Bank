<?php
 
use Ramsey\Uuid\Uuid;
function uuid4() :string
{
    return Uuid::uuid4()->toString();
}

?>