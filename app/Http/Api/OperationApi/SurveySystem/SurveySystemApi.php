<?php


namespace App\Http\Api\OperationApi\SurveySystem;

use App\Http\Api\OperationApi\OperationApi;
use Illuminate\Http\Request;

class SurveySystemApi extends OperationApi
{
    public function GetSurveyList()
    {
        $endpoint = "SurveySystem/GetSurveyList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetSurveyEdit($id)
    {
        $endpoint = "SurveySystem/GetSurveyEdit";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SurveyId' => $id
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $params);
    }

    public function GetSurveyQuestionsList($surveyCode)
    {
        $endpoint = "SurveySystem/GetSurveyQuestionsList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SurveyCode' => $surveyCode
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $params);
    }

    public function GetSurveyQuestionEdit($id)
    {
        $endpoint = "SurveySystem/GetSurveyQuestionEdit";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SurveyQuestionsId' => $id
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $params);
    }

    public function GetSurveyAnswersList($questionId)
    {
        $endpoint = "SurveySystem/GetSurveyAnswersList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'QuestionsId' => $questionId
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $params);
    }

    public function GetSurveyAnswerEdit($id)
    {
        $endpoint = "SurveySystem/GetSurveyAnswerEdit";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SurveyAnswerId' => $id
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $params);
    }

    public function GetSurveyGroupConnectList($surveyCode)
    {
        $endpoint = "SurveySystem/GetSurveyGroupConnectList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SurveyCode' => $surveyCode
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $params);
    }

    public function GetSurveyAnswersConnectList($id)
    {
        $endpoint = "SurveySystem/GetSurveyAnswersConnectList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'AnswersId' => $id
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $params);
    }

    public function GetSurveyAnswersCategoryConnectList($id)
    {
        $endpoint = "SurveySystem/GetSurveyAnswersCategoryConnectList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'AnswersId' => $id
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $params);
    }

    public function SetSurvey(Request $request)
    {
        $endpoint = "SurveySystem/SetSurvey";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'id' => $request->id,
            'kodu' => $request->code,
            'adi' => $request->name,
            'aciklama' => $request->description,
            'musteriBilgilendirme' => $request->customer_information_1,
            'musteriBilgilendirme2' => $request->customer_information_2,
            'uyumCrmHizmetUrun' => $request->service_or_product,
            'uyumCrmCagriNedeni' => $request->call_reason,
            'uyumCrmFirsat' => $request->opportunity,
            'uyumCrmCagri' => $request->call,
            'uyumCrmAramaPlani' => $request->dial_plan,
            'uyumCrmFirsatSaticiyaYonlendir' => $request->opportunity_redirect_to_seller,
            'uyumCrmAramaPlaniSaticiyaYonlendir' => $request->dial_plan_redirect_to_seller,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $params);
    }

    public function SetSurveyQuestions(Request $request)
    {
        $endpoint = "SurveySystem/SetSurveyQuestions";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'id' => $request->id,
            'soru' => $request->question,
            'soruTurKodu' => $request->question_type_id,
            'ekCevapString' => $request->additional_question,
            'siraNo' => $request->order_number,
            'grupKodu' => $request->group_code
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $params);
    }

    public function SetSurveyAnswers(Request $request)
    {
        $endpoint = "SurveySystem/SetSurveyAnswers";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'id' => $request->id,
            'anketSorularId' => $request->question_id,
            'cevap' => $request->answer,
            'siraNo' => $request->order_number
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $params);
    }

    public function SetSurveyDelete($id)
    {
        $endpoint = "SurveySystem/SetSurveyDelete";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token
        ];

        $params = [
            'SurveyId' => $id
        ];

        return $this->callApi($this->baseUrl . $endpoint . '?' . http_build_query($params), 'post', $headers, $params);
    }

    public function SetSurveyQuestionsDelete($id)
    {
        $endpoint = "SurveySystem/SetSurveyQuestionsDelete";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SurveyQuestionsId' => $id
        ];

        return $this->callApi($this->baseUrl . $endpoint . '?' . http_build_query($params), 'post', $headers, $params);
    }

    public function SetSurveyAnswersDelete($id)
    {
        $endpoint = "SurveySystem/SetSurveyAnswersDelete";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SurveyAnswersId' => $id
        ];

        return $this->callApi($this->baseUrl . $endpoint . '?' . http_build_query($params), 'post', $headers, $params);
    }

    public function SetSurveyAnswersConnectDelete($id)
    {
        $endpoint = "SurveySystem/SetSurveyAnswersConnectDelete";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SurveyAnswersConnectId' => $id
        ];

        return $this->callApi($this->baseUrl . $endpoint . '?' . http_build_query($params), 'post', $headers, $params);
    }

    public function SetSurveyAnswersCategoryConnect($list)
    {
        $endpoint = "SurveySystem/SetSurveyAnswersCategoryConnect";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $list);
    }

    public function SetSurveyGroupConnect($mainCode, $additionalCode)
    {
        $endpoint = "SurveySystem/SetSurveyGroupConnect";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'anaAnketGrupKodu' => $mainCode,
            'ekAnketGrupKodu' => $additionalCode
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $params);
    }

    public function SetSurveyAnswersConnect($list)
    {
        $endpoint = "SurveySystem/SetSurveyAnswersConnect";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $list);
    }
}
