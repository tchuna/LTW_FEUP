Grupo LTW26

Elgner Eristido Gomes Ramos - up201208090
Nádia de Sousa Varela de Carvalho - up201208223
Tiago Lascasas dos Santos - up201503616

Algumas das credenciais (username / password):
- utilizador1 / 12345
- utilizador4 / 12345 (ambos com listas e projetos, alguns partilhados)
- utilizador2 / 12345
- utilizador3 / 12345 (sem material criado)

Observações sobre as tecnologias utilizadas:
- Todas as páginas HTML geradas foram validadas com sucesso
- Foi feito uso de várias funcionalidades de CSS, em particular grids
- Foi usado Ajax/JSON para a obtenção de listas de alternativas e marcar um item como completo
- A base de dados não deve ser gerada novamente, visto que as credenciais e informação acima não
constam no ficheiro do esquema

Observações sobre a segurança contra ataques:
- SQL Injection: em todos os acessos à base de dados foram usados statements prepare/execute do PDO, o que previne a SQL Injection
- XSS: inputs validados usando htmlspecialchars (actions_userSignUp.php) e cookies expiram assim que a página é fechada (includes/session.php)
- CSRF: token aleatório gerado por sessão (includes/session.php)
- Passwords: todas as passwords são armazenadas como um hash + sal usando o bcrypt (database/user.php), e são usadas as funções de php para criar e verificar esses hashes
- Session Fixation: uso de session_regenerate_id(true) (includes/session.php)
