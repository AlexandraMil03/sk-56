<?
if($_GET['name']=='1')
{
 $file='inform_letter.pdf';
}


if($_GET['name']=='2')
{
 $file='USTAV.pdf';
}

if($_GET['name']=='3')
{
 $file='license.pdf';
}

if($_GET['name']=='4')
{
 $file='foundry_license.pdf';
}

if($_GET['name']=='5')
{
 $file='foundry_license_annex.pdf';
}

if($_GET['name']=='6')
{
 $file='2019-10-17 Декларация о соответствии.pdf';
}

if($_GET['name']=='7')
{
 $file='ТУ стружкодробильный комплекс.doc';
}

if($_GET['name']=='8')
{
 $file='2015-06-11 Свидетельство.pdf';
}

if($_GET['name']=='9')
{
 $file='2022-06-21 Патент № 2774530.pdf';
}




function file_force_download($file) {
  if (file_exists($file)) {
    // сбрасываем буфер вывода PHP, чтобы избежать переполнения памяти выделенной под скрипт
    // если этого не сделать файл будет читаться в память полностью!
    if (ob_get_level()) {
      ob_end_clean();
    }
    // заставляем браузер показать окно сохранения файла
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    // читаем файл и отправляем его пользователю
    readfile($file);
    exit;
  }
}




file_force_download('../../database/files_other/'.$file.''); //Тут файл для скачивания
?>