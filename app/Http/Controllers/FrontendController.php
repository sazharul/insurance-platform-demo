<?php

namespace App\Http\Controllers;

use App\Models\BoardOfDirector;
use App\Models\CeoMdMessage;
use App\Models\CeoProfile;
use App\Models\ChairmanMessage;
use App\Models\ChairmanProfile;
use App\Models\Employee;
use App\Models\EmployeeList;
use App\Models\Management;
use App\Models\ManagementMember;
use App\Models\ManagementName;
use App\Models\MissionVision;
use App\Models\CommitteeBoard;
use App\Models\ContactU;
use App\Models\Award;
use App\Models\AwardList;
use App\Models\NewsEvent;
use App\Models\NewsEventList;
use App\Models\Notice;
use App\Models\NoticeList;
use App\Models\BoardCategory;
use App\Models\Designation;
use App\Models\BoardMember;
use App\Models\Department;
use App\Models\ChairmanAwardList;
use App\Models\InvolvementList;
use App\Models\CommitteeName;
use App\Models\CommitteeBoardMember;
use App\Models\CreditRating;
use App\Models\AgentList;
use App\Models\ClaimsForm;
use App\Models\KycProfileForm;
use App\Models\ProposalForm;
use App\Models\CompanyProfile;
use App\Models\HomePage;
use App\Models\AboutUsPage;
use App\Models\CircularPage;
use App\Models\CircularList;
use App\Models\ClaimFormList;
use App\Models\LinkWebsite;
use App\Models\LinkWebsiteList;
use App\Models\ComplainFeedbackPage;
use App\Models\Menu;
use App\Models\ProductServices;
use App\Models\ProposalFormList;

class FrontendController extends Controller {
    public function select() {
        return view('frontend.select');
    }
    public function index() {
        $data         = [];
        $data['name'] = 'Easland';
        $data['news_event_list'] = NewsEventList::where('status',1)->orderBy('id','desc')->get();
        $data['home_page_content'] = HomePage::first();
        $data['menus'] = Menu::get();
        $data['product_service'] = ProductServices::all();

        return view('frontend.index', $data);
    }
    public function aboutUs(){

        $data['about_us'] = AboutUsPage::first();
        return view('frontend.who-we-are.show_about_us', $data);
    }
    public function contactUS(){
        $contact_us = ContactU::first();
        return view('frontend.contact.contact_us', compact('contact_us'));
    }
    public function moreAwards(){
        $data['awards'] = Award::first();
        $data['award_list'] = AwardList::where('status',1)->orderBy('id','desc')->get();

        return view('frontend.more.awards', $data);
    }
    public function moreNewsEvent(){
        $data['news_event'] = NewsEvent::first();
        $data['news_event_list'] = NewsEventList::where('status',1)->orderBy('id','desc')->get();

        return view('frontend.more.news_event', $data);
    }
    public function newsEventDetails($id){
        $data['news_event_details'] = NewsEventList::find($id);

        return view('frontend.more.news_event_details', $data);
    }
    public function moreNotices(){
        $data['notice'] = Notice::first();
        // $data['notice_year'] = NoticeList::groupBy('en_year')->select('en_year')->orderBy('en_year','desc')->get();
        // $data['notice_year'] = NoticeList::orderBy('en_year','desc')->get()->groupBy('en_year');
        $data['notice_list'] = NoticeList::where('status',1)->orderBy('id','desc')->get();
// dd($data);
        return view('frontend.more.notice', $data);
    }
    public function noticesDetails($id){
        $data['notice_details'] = NoticeList::find($id);

        return view('frontend.more.notice_details', $data);
    }
    public function chairmanProfile(){
        $data['chairman_profile'] = ChairmanProfile::first();
        $data['chairman_award_list'] = ChairmanAwardList::where('status',1)->orderBy('id','desc')->get();
        $data['chairman_involvement_list'] = InvolvementList::where('status',1)->orderBy('position','asc')->get();
        return view('frontend.who-we-are.chairman_profile', $data);
    }
    public function chairmanMessage(){
        $chairman_message = ChairmanMessage::first();
        return view('frontend.who-we-are.chairman_message', compact('chairman_message'));
    }
    public function ceoMessage(){
        return view('frontend.who-we-are.ceo_message');
    }
    public function mdMessage(){
        $chairman_message = CeoMdMessage::first();
        return view('frontend.who-we-are.md_message', compact('chairman_message'));
    }
    public function ceoProfile(){
        $ceo_profile = CeoProfile::first();
        return view('frontend.who-we-are.ceo_profile', compact('ceo_profile'));
    }
    public function mdProfile(){
        return view('frontend.who-we-are.md_profile');
    }
    public function boardOfDirectors(){

        $data['board_of_directors'] = BoardOfDirector::first();
        $data['board_category'] = BoardCategory::with('boardMember.designation')->where('status', 1)->get();
        $data['designation'] = Designation::where('status', 1)->where('en_name', 'Chairman')->with('chairmanInfo')->first();

        return view('frontend.who-we-are.board_of_directors', $data);
    }
    public function bodProfile($id){
        $data['bod_details'] = BoardMember::find($id);
        return view('frontend.who-we-are.bod_profile', $data);
    }
    public function management(){
        $data['management'] = Management::first();
        $data['chief'] = ManagementMember::orderBy('position', 'asc')->where('status', 1)->first();
        $data['management_member'] = ManagementMember::orderBy('position', 'asc')->where('status', 1)->skip(1)->take(500)->get();
        return view('frontend.who-we-are.management', $data);
    }
    public function employeeList(){
        $data['employee'] = Employee::first();
        $data['employee_list'] = EmployeeList::where('status',1)->orderBy('position','asc')->with('designation', 'departmentInfo')->get();
        return view('frontend.who-we-are.employee_list', $data);
    }
    public function boardCommitees(){
        $data['board_commiittees'] = CommitteeBoard::first();
        $data['commiittee_name'] = CommitteeName::where('status',1)->get();

        $type = request()->get('type');
        if($type){
            $type = urldecode($type);
            $data['commiittee_name_active'] = $find_commiitee = CommitteeName::where('en_name',$type)->where('status', 1)->first();
        }else{
            $data['commiittee_name_active'] = $find_commiitee = CommitteeName::where('status', 1)->first();
        }

        $data['commiittee_member_name'] = CommitteeBoardMember::where('committee_name_id', $find_commiitee?->id)->where('status',1)->orderBy('position','asc')->get();
        return view('frontend.who-we-are.commitees-of-the-board.commitees_of_the_board', $data);
    }
    public function auditCommitees(){
        $data['commiittee_name'] = CommitteeName::where('status',1)->get();
        $data['commiittee_member_name'] = CommitteeBoardMember::where('committee_name_id',2)->where('status',1)->orderBy('position','asc')->get();
        return view('frontend.who-we-are.commitees-of-the-board.audit_commitee', $data);
    }
    public function businessCommitees(){
        $data['commiittee_name'] = CommitteeName::where('status',1)->get();
        $data['commiittee_member_name'] = CommitteeBoardMember::where('committee_name_id',3)->where('status',1)->orderBy('position','asc')->get();
        return view('frontend.who-we-are.commitees-of-the-board.business_commitee', $data);
    }
    public function nrCommitees(){
        $data['commiittee_name'] = CommitteeName::where('status',1)->get();
        $data['commiittee_member_name'] = CommitteeBoardMember::where('committee_name_id',4)->where('status',1)->orderBy('position','asc')->get();
        return view('frontend.who-we-are.commitees-of-the-board.nr_commitee', $data);
    }
    public function missionVission(){
        $data ['mission_vission'] = MissionVision::first();
        return view('frontend.who-we-are.mission_vission',$data);
    }
    public function companyProfile(){
        $data['company_profile'] = CompanyProfile::first();
        return view('frontend.who-we-are.company_profile', $data);
    }
    public function workFlowDesign(){
        return view('frontend.who-we-are.work_flow_design');
    }
    public function circular(){
        $data['circular_page'] = CircularPage::first();
        $data['circular_list'] = CircularList::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.more.circular', $data);
    }
    public function circularDetails($id){
        $data['circular_page'] = CircularPage::first();
        $data['circular_details'] =CircularList::find($id);
        return view('frontend.more.circular_details', $data);
    }
    public function CreditRating(){
        $data['credit_rating'] = CreditRating::first();
        return view('frontend.who-we-are.credit_rating', $data);
    }
    public function links(){
        $data['links'] = LinkWebsite::first();
        $data['link_list'] = LinkWebsiteList::where('status',1)->orderBy('id','desc')->get();
        return view('frontend.more.links', $data);
    }
    public function reportComplains(){
        $data['report_complain'] = ComplainFeedbackPage::first();
        return view('frontend.more.report_complains' ,$data);
    }
    public function agentList(){
        $data['agent_list'] = AgentList::first();
        return view('frontend.who-we-are.agent_list', $data);

    }
    public function kycProfileForm(){
        $data['kyc_profile_form'] = KycProfileForm::first();
        return view('frontend.more.kyc_profile_form', $data);
    }
    public function proposalForm(){
        $data['proposal_form'] = ProposalForm::first();
        $data['proposal_form_list'] = ProposalFormList::orderBy('id','desc')->get();
        return view('frontend.more.proposal_form', $data);
    }

    public function proposalFormListDetails($id){
        $data['proposal_form'] = ProposalForm::first();
        $data['proposal_form_details'] =ProposalFormList::find($id);
        return view('frontend.more.proposal_form_details', $data);
    }
    public function claimsForm(){
        $data['claims_form'] = ClaimsForm::first();
        $data['claims_form_list'] = ClaimFormList::orderBy('id','desc')->get();
        return view('frontend.more.claims_form', $data);
    }
    public function claimsFormDetails($id){
        $data['claims_form'] = ClaimsForm::first();
        $data['claims_form_details'] = ClaimFormList::find($id);
        return view('frontend.more.claim_form_details', $data);
    }
}

