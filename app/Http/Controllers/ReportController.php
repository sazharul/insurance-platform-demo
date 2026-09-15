<?php

namespace App\Http\Controllers;

use App\Models\FinancialParticular;
use App\Models\FinancialYear;
use Illuminate\Http\Request;
use App\Models\FinancialHighlight;
use App\Models\FinancialList;
use App\Models\AnnualReport;
use App\Models\AnnualReportList;
use App\Models\QuarterlyReport;
use App\Models\QuarterlyReportList;
use App\Models\ValueAddedStatement;
use App\Models\ValueAddedStatementList;

class ReportController extends Controller
{
    public function annualReport()
    {
        $data['annual_report'] = AnnualReport::first();
        $data['annual_report_list'] = AnnualReportList::orderBy('id', 'desc')->get();

        return view('frontend.financial-indicators.annual-report', $data);
    }

    public function annualReportDetails($id)
    {
        $data['annual_report_details'] = AnnualReportList::find($id);
        return view('frontend.financial-indicators.annual_report_details', $data);
    }

    public function quarterlyReport()
    {
        $data['quarterly_report'] = QuarterlyReport::first();
        $data['quarterly_report_list'] = QuarterlyReportList::orderBy('id', 'desc')->get();

        return view('frontend.financial-indicators.quarterly-report', $data);
    }

    public function quarterlyReportDetails($id)
    {
        $data['quarterly_report_details'] = QuarterlyReportList::find($id);
        return view('frontend.financial-indicators.quarterly_report_details', $data);
    }

    public function financialHighlights()
    {
        $data['financial_particular'] = FinancialParticular::orderBy('position', 'asc')->get();
        $data['financial_year'] = FinancialYear::orderBy('en_year', 'desc')->paginate(5);

        $data['financial_highlight'] = FinancialHighlight::first();


        return view('frontend.financial-indicators.financial-highlights', $data);
    }

    public function valueAddedStatement()
    {
        $data['value_added_statement'] = ValueAddedStatement::first();
        $data['value_added_statement_list'] = ValueAddedStatementList::orderBy('id', 'desc')->get();
        return view('frontend.financial-indicators.value_added_statement', $data);
    }

    public function valueAddedStatementDetails($id)
    {
        $data['value_added_statement'] = ValueAddedStatement::first();
        $data['value_added_statement_list_details'] = ValueAddedStatementList::find($id);
        return view('frontend.financial-indicators.value_added_statement_details', $data);
    }
}
