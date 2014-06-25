<?php
if (empty($list))
{
    $error_message = lang('rerror_nothinginqueue');
}
if (!empty($message))
{
    echo '<div data-alert class="alert-box info"><p>' . $message . '</p></div>';
}
if (!empty($error_message))
{
    echo '<div data-alert class="alert-box warning">' . $error_message . '</div>';
}
if (!empty($list))
{
    $tmpl = array('table_open' => '<table  id="details" class="tablesorter">');
    $this->table->set_template($tmpl);
    $this->table->set_heading(lang('rr_tbltitle_date'), lang('rr_tbltitle_requester'), lang('rr_tbltitle_requesttype'), lang('rr_tbltitle_primcontact'), lang('rr_tbltitle_name'), lang('rr_tbltitle_confirmed'), '');
    $this->table->set_caption(lang('rr_listawaiting'));
    foreach ($list as $q)
    {
        if ($q['confirmed'])
        {
            $confirm = lang('rr_yes');
        } else
        {
            $confirm = lang('rr_no');
        }
        $cdate = $q['idate'];
        $detail = anchor(base_url()."/reports/awaiting/detail/" . $q['token'], '>>');
        $this->table->add_row($q['idate'], $q['requester'], $q['type'] . " - " . $q['action'], $q['mail'], $q['iname'], $confirm, $detail);
    }
    echo $this->table->generate();
    $this->table->clear();
}
