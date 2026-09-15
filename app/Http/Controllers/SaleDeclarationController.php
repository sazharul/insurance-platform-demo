<?php

namespace App\Http\Controllers;

use App\Models\DetailsOfShareholding;
use App\Models\DetailsOfShareholdingList;
use Illuminate\Http\Request;
use App\Models\DirectorReport;
use App\Models\DirectorReportList;
use App\Models\DistributionPolicy;
use App\Models\PendingDividend;
use App\Models\PendingDividendList;
use App\Models\CodeOfConduct;
use App\Models\PriceSensitive;
use App\Models\PriceSensitiveList;
use App\Models\NoticeInvestor;
use App\Models\NoticeInvestorList;
use App\Models\SaleBuyDeclaration;
use App\Models\SaleBuyDeclarationList;
use App\Models\ShareholdingPosition;
use App\Models\ShareholdingList;
use App\Models\CorporateGovernance;
use App\Models\InvestorRelationDepartment;

class SaleDeclarationController extends Controller
{
    public function saleBuy()
    {
        $data['sale_buy'] = SaleBuyDeclaration::first();
        $data['sale_buy_list'] = SaleBuyDeclarationList::where('status',1)->orderBy('position', 'asc')->get();

        return view('frontend.investors-relation.sale-buy', $data);
    }

    public function priceSensitive()
    {
        $data['price_sensitive'] = PriceSensitive::first();
        $data['price_sensitive_list'] = PriceSensitiveList::where('status',1)->orderBy('id', 'desc')->get();
        return view('frontend.investors-relation.price-sensitive', $data);
    }
    public function priceSensitiveDetails($id)
    {
        $data['price_sensitive_details'] = PriceSensitiveList::find($id);
        return view('frontend.investors-relation.price-sensitive-details', $data);
    }


    public function shareHoldingPosition()
    {
        $data['share_holding_position'] = ShareholdingPosition::first();
        $data['share_holding_position_list'] = ShareholdingList::orderBy('position', 'asc')->get();
        return view('frontend.investors-relation.share-holding-position', $data);
    }

    public function shareHolding()
    {
        $data = [];
        $data['details_of_shareholding'] = DetailsOfShareholding::first();
        $data['details_of_shareholding_list'] = DetailsOfShareholdingList::orderBy('position','asc')->get();
        $data['details_of_shareholding_name'] = DetailsOfShareholdingList::orderBy('position','asc')->pluck('en_name');
        $data['details_of_shareholding_color'] = DetailsOfShareholdingList::orderBy('position','asc')->pluck('pie_chart_color');
        return view('frontend.investors-relation.share-holding', $data);
    }

    public function directorsReports()
    {
        $data['directors_reports'] = DirectorReport::first();
        $data['directors_report_list'] = DirectorReportList::where('status',1)->orderBy('id', 'desc')->get();
        return view('frontend.investors-relation.directors_reports', $data);
    }

    public function directorsReportsDetails($id)
    {
        $data['directors_reports_details'] = DirectorReportList::find($id);

        return view('frontend.investors-relation.director_report_details', $data);
    }
    public function noticeInvestor()
    {
        $data['notice_investor'] = NoticeInvestor::first();
        $data['notice_investor_list'] = NoticeInvestorList::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.investors-relation.notice_investor', $data);
    }
    public function investorNoticeDetails($id)
    {
        $data['notice_details'] = NoticeInvestorList::find($id);

        return view('frontend.investors-relation.notice_details', $data);
    }
    public function dividendDistributionPolicy()
    {
        $dividend_distribution_policy = DistributionPolicy::first();
        return view('frontend.investors-relation.dividend_distribution_policy', compact('dividend_distribution_policy'));
    }
    public function unpaidUnclaimedDividend()
    {
        $data['unpaid_unclaimed_dividend'] = PendingDividend::first();
        $data['unpaid_unclaimed_dividend_list'] = PendingDividendList::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.investors-relation.unpaid_unclaimed_dividend', $data);
    }

    public function unpaidUnclaimedDividendDetails($id)
    {
        $data['unpaid_unclaimed_dividend_details'] = PendingDividendList::find($id);

        return view('frontend.investors-relation.unpaid_unclaimed_dividend_details', $data);
    }
    public function codeOfConduct()
    {
        $code_of_conduct = CodeOfConduct::first();
        return view('frontend.investors-relation.code_of_conduct', compact('code_of_conduct'));
    }
    public function investorsRelationDepartment()
    {
        $data['investor_ralation_department'] = InvestorRelationDepartment::first();
        return view('frontend.investors-relation.investors_relation_department' ,$data);
    }
    public function corporateGovernance()
    {
        $data['corporate_governance'] = CorporateGovernance::first();
        return view('frontend.investors-relation.corporate_governance', $data);
    }
}
