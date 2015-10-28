<?php

namespace ArrayToTable;

/*
 * LingTalfi 2015-10-28
 */
class ArrayToTableUtil
{


    private $caption;

    /**
     * array of id => label
     * The header id will be used as a reference by other mechanisms
     */
    private $headers;

    /**
     * Each body is an ensemble or rows
     */
    private $bodies;
    /**
     * Structure is like a single row of a body
     */
    private $footer;

    public function __construct()
    {
        $this->bodies = [];
    }

    public static function create()
    {
        return new static();
    }

    public function addBody(array $rows)
    {
        $this->bodies[] = $rows;
        return $this;
    }

    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
        return $this;
    }

    public function setFooter(array $footer)
    {
        $this->footer = $footer;
        return $this;
    }

    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }


    public function render()
    {

        $s = '';
        $s .= $this->renderTopTag();

        if (null !== $this->caption) {
            $s .= $this->renderCaption($this->caption);
        }
        if ($this->headers) {
            $s .= $this->renderHeader($this->headers);
        }
        if ($this->footer) {
            $s .= $this->renderFooter($this->footer);
        }

        foreach ($this->bodies as $rows) {
            $s .= $this->renderBody($rows);
        }

        $s .= $this->renderBottomTag();
        return $s;
    }

    //------------------------------------------------------------------------------/
    // 
    //------------------------------------------------------------------------------/
    protected function renderTopTag()
    {
        return '<table>';
    }

    protected function renderCaption($caption)
    {
        return '<caption>' . $caption . '</caption>';
    }

    protected function renderHeader(array $headers)
    {
        $s = '';
        $s .= '<thead>';
        $s .= '<tr>';
        foreach ($headers as $id => $label) {
            $s .= '<th>' . $label . '</th>';
        }
        $s .= '</tr>';
        $s .= '</thead>';
        return $s;
    }

    protected function renderFooter(array $footer)
    {
        $s = '';
        $s .= '<tfoot>';
        $s .= $this->renderRow($footer);
        $s .= '</tfoot>';
        return $s;
    }

    protected function renderBody(array $rows)
    {
        $s = '';
        $s .= '<tbody>';
        foreach ($rows as $row) {
            $s .= $this->renderRow($row);
        }
        $s .= '</tbody>';
        return $s;
    }

    protected function renderBottomTag()
    {
        return '</table>';
    }


    protected function renderRow(array $row)
    {
        $s = '';
        $s .= '<tr>';
        foreach ($row as $v) {
            $s .= '<td>' . $v . '</td>';
        }
        $s .= '</tr>';
        return $s;
    }
}
