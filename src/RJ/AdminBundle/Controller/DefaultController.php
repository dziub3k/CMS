<?php

namespace RJ\AdminBundle\Controller;

use Ob\HighchartsBundle\Highcharts\Highchart;
use RJ\UtilitiesBundle\Controller\BaseController;

class DefaultController extends BaseController
{
    public function indexAction()
    {
        // Chart
        $series = array(
            array("name" => "Data Serie Name",    "data" => array(1,2,4,5,6,3,8))
        );

        $ob1 = new Highchart();
        $ob1->chart->renderTo('linechart1');  // The #id of the div where to render the chart
        $ob1->title->text('Chart Title');
        $ob1->xAxis->title(array('text'  => "Horizontal axis title"));
        $ob1->yAxis->title(array('text'  => "Vertical axis title"));
        $ob1->series($series);
        $ob2 = new Highchart();
        $ob2->chart->renderTo('linechart2');  // The #id of the div where to render the chart
        $ob2->title->text('Statystyki sprzedaży');
        $ob2->xAxis->title(array('text'  => "Horizontal axis title"));
        $ob2->yAxis->title(array('text'  => "Vertical axis title"));
        $ob2->series($series);

        return $this->render(
            'RJAdminBundle:Default:index.html.twig',
            array(
                'chart1' => $ob1,
                'chart2' => $ob2
            )
        );
    }
}
