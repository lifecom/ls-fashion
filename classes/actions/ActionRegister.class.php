<?php
/*
  Fashion plugin
  (P) Mirocow, 2013
  http://mirocow.com/
*/

class PluginFashion_ActionRegister extends ActionPlugin {

  public function Init() {
  }

  protected function RegisterEvent() {
    foreach(Config::Get('plugin.fashion.Profiles') as $title => $item){
      $this->AddEvent($item,'Register');
    }
  }

  public function Register(){
    if(isPost('submit_register'))
      Router::Action('registration');
    else{
      $profile = $this->GetEventMatch(0);
      $this->Viewer_Assign('header', TRUE);
      $this->Viewer_Assign('footer', TRUE);
      $this->Viewer_Assign('Key', $profile);
      $this->SetTemplate(Plugin::GetTemplatePath('fashion') . "registrations/{$profile}_form.tpl");
    }
  }

}