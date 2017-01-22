<?php
final class FileReader
{
    protected $handler = null;
    protected $fbuffer = "";

    public function __construct($filename)
    {
        if(!($this->handler = fopen($filename, "rb")))
            throw new Exception("Cannot open the file");
    }


    public function ReadAll()
    {
        if(!$this->handler)
            throw new Exception("Invalid file pointer");

        while(!feof($this->handler))
            $this->fbuffer .= fgets($this->handler);

        return $this->fbuffer;
    }

    public function SetOffset($line)
    {
        if(!$this->handler)
            throw new Exception("Invalid file pointer");

        while(!feof($this->handler) && $line--) {
            fgets($this->handler);
        }
    }
}


$stream = new FileReader("../query.log");

// ������, ��� ������ ���� � 20-�� ������
//$stream->SetOffset(20);

// �������� ����������
$x = $stream->ReadAll();
var_dump($x);
