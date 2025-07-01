<?php

namespace MenyongMenying\MLibrary\Kucil\Http\MRequest;

use MenyongMenying\MLibrary\Kucil\Utilities\MData\MData;
use MenyongMenying\MLibrary\Kucil\Utilities\MString\MString;

/**
 * @author MenyongMenying <menyongmenying.main@email.com>
 * @version 0.0.1
 * @date 2025-07-01
 */
final class MRequestJson
{
    /**
     * Sumber data mentahan.
     */
    private const SOURCE = 'php://input';

    /**
     * Objek dari class 'MString'.
     * @var \MenyongMenying\MLibrary\Kucil\Utilities\MString\MString 
     */
    private MString $mString;

    /**
     * Data dari request.
     * @var \MenyongMenying\MLibrary\Kucil\Utilities\MData\MData 
     */
    private null|MData $data;

    /**
     * @param  \MenyongMenying\MLibrary\Kucil\Utilities\MString\MString $mString 
     * @return void
     */
    public function __construct(MString $mString)
    {
        $this->mString = $mString;
        switch(true) {
            case $this->mString->isWhiteSpaceOnly($this->getRawData(self::SOURCE)):
                $this->data = new MData($this->mString);
                break;
            case $this->mString->isValidJsonFormat($this->getRawData(self::SOURCE)):
                $this->data = new MData($this->mString, $this->mString->jsonDecode($this->getRawData(self::SOURCE)));
                break;
            default:
                $this->data = null;
                break;
        }
        return;
    }

    /**
     * Meneruskan data mentah dari request.
     * @param  string $source Sumber data mentah.
     * @return string         Data mentahan.
     */
    public function getRawData(string $source) :string
    {
        return file_get_contents($source);
    }

    /**
     * Meneruskan data dari request.
     * @return null|\MenyongMenying\MLibrary\Kucil\Utilities\MData\MData 
     */
    public function getData() :null|MData
    {
        return $this->data;
    }
}