var getLang = function (lang) {
  const auth_email = require('./' + lang + '/auth/email').default
  const auth_login = require('./' + lang + '/auth/login').default
  const auth_register = require('./' + lang + '/auth/register').default
  const auth_reset = require('./' + lang + '/auth/reset').default

  const front_toolbar = require('./' + lang + '/front/toolbar').default
  const front_hero = require('./' + lang + '/front/hero').default
  const front_iphone = require('./' + lang + '/front/iphone').default
  const front_listIcon = require('./' + lang + '/front/listicon').default
  const front_listIconPres = require('./' + lang + '/front/listiconpres').default
  const front_playParty = require('./' + lang + '/front/playparty').default
  const front_divisionTask = require('./' + lang + '/front/divisiontask').default
  const front_gameMode = require('./' + lang + '/front/gamemode').default
  const front_footer = require('./' + lang + '/front/footer').default

  const app_components_account = require('./' + lang + '/game/components/account').default
  const app_layout_drawer = require('./' + lang + '/game/layout/drawer').default

  return {
    'auth.login':auth_login,
    'auth.email':auth_email,
    'auth.register': auth_register,
    'auth.reset': auth_reset,
    'front.toolbar': front_toolbar,
    'front.hero': front_hero,
    'front.iphone': front_iphone,
    'front.list-icon': front_listIcon,
    'front.list-icon-pres': front_listIconPres,
    'front.play-party': front_playParty,
    'front.division-task': front_divisionTask,
    'front.game-mode': front_gameMode,
    'front.footer': front_footer,
    'app.components.account': app_components_account,
    'app.layout.drawer': app_layout_drawer
  }
}

export default getLang
