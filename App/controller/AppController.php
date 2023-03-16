<?php

namespace Diamancia\App\controller;

use Diamancia\App\controller\Controller;
// require_once 'app/controller/Controller.php';

class AppController extends Controller
{

    public function home()
    {
        $this->createView('home', ['css' => 'home']);
    }

    public function error()
    {
        global $except;
        $this->createView('error', ['error' => $except->getMessage()]);
    }

    //exemple si ajout pdf dans about ou pdf a télécharger par client
    // public function about()
    // {
    //     //$this->createView('about', []);
    //     $dompdf = new Dompdf();
    //     $dompdf->loadHtml('<style>h2 {color:blue;}</style><h2>hello world</h2>');

    //     // (Optional) Setup the paper size and orientation
    //     $dompdf->setPaper('A4', 'landscape');

    //     // Render the HTML as PDF
    //     $dompdf->render();

    //     // Output the generated PDF to Browser
    //     $dompdf->stream();
    // }

}

?>
