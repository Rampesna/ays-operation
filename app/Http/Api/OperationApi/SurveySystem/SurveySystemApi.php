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

    public function GetSurveyProductList()
    {
        $endpoint = "SurveySystem/GetSurveyProductList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetSurveySellerList()
    {
        $endpoint = "SurveySystem/GetSurveySellerList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers);
    }

    public function GetSurveyAnswersProductConnectList($answerId)
    {
        $endpoint = "SurveySystem/GetSurveyAnswersProductConnectList";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'AnswersId' => $answerId
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $params);
    }

    public function GetSurveySellerEdit($sellerId)
    {
        $endpoint = "SurveySystem/GetSurveySellerEdit";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SellerId' => $sellerId
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $params);
    }

    public function GetSurveySellerCodeEdit($sellerCode)
    {
        $endpoint = "SurveySystem/GetSurveySellerCodeEdit";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SellerCode' => $sellerCode
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'get', $headers, $params);
    }

    public function GetSurveyProductEdit($productId)
    {
        $endpoint = "SurveySystem/GetSurveyProductEdit";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'ProductId' => $productId
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
            'uyumCrmSaticiKoduTurKodu' => $request->seller_redirection_type,
            'epostaBaslik' => $request->email_title,
            'epostaIcerik' => $request->hasFile('file') ? file_get_contents($request->file('file')) : ''
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
            'grupKodu' => $request->group_code,
            'soruAciklama' => $request->description
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

    public function SetSurveyAnswersConnectDelete($id, $code)
    {
        $endpoint = "SurveySystem/SetSurveyAnswersConnectDelete";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SurveyAnswersConnectId' => $id,
            'SurveyCode' => $code
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

    public function SetSurveyAnswersProductConnect($list)
    {
        $endpoint = "SurveySystem/SetSurveyAnswersProductConnect";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $list);
    }

    public function SetSurveySellerConnect($list)
    {
        $endpoint = "SurveySystem/SetSurveySellerConnect";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $list);
    }

    public function SetSurveySellerDelete($sellerCode)
    {
        $endpoint = "SurveySystem/SetSurveySellerDelete";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        $params = [
            'SellerCode' => $sellerCode
        ];

        return $this->callApi($this->baseUrl . $endpoint . '?' . http_build_query($params), 'post', $headers, $params);
    }

    public function SetSurveyProduct($list)
    {
        $endpoint = "SurveySystem/SetSurveyProduct";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $list);
    }

    public function SetSurveyPersonConnect($list)
    {
        $endpoint = "SurveySystem/SetSurveyPersonConnect";
        $headers = [
            'Authorization' => 'Bearer ' . $this->_token,
        ];

        return $this->callApi($this->baseUrl . $endpoint, 'post', $headers, $list);
    }
}
