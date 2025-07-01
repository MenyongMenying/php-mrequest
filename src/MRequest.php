<?php

namespace MenyongMenying\MLibrary\Kucil\Http\MRequest;

use MenyongMenying\MLibrary\Kucil\Utilities\MData\MData;
use MenyongMenying\MLibrary\Kucil\Utilities\MString\MString;

/**
 * @author MenyongMenying <menyongmenying.main@email.com>
 * @version 0.0.1
 * @date 2025-07-01
 */
final class MRequest
{
    /**
     * Objek dari class 'MString'.
     * @var \MenyongMenying\MLibrary\Kucil\Utilities\MString\MString 
     */
    private MString $mString;

    /**
     * Objek dari class turunan 'MRequestJson'.
     * @var MRequestJson 
     */
    private MRequestJson $mRequestJson;

    /**
     * @param  \MenyongMenying\MLibrary\Kucil\Utilities\MString\MString $mString 
     * @return void
     */
    public function __construct(MString $mString)
    {
        $this->mString = $mString;
        $this->mRequestJson = new MRequestJson($this->mString);
        return;
    }

    /**
     * Meneruskan data dari input(json) request.
     * @return null|MData data dari input request. 
     */
    public function json() :null|MData
    {
        return $this->mRequestJson->getData();
    }
}
