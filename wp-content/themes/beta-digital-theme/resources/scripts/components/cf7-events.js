import $ from 'jquery';
export default class CF7Events {
    constructor() {
        this.selector = '.wpcf7-form';
        this.init();
    }

    init() {
        const form = document.querySelector(this.selector);
    
        if (!form) {
            return;
        }

        document.addEventListener('wpcf7submit', (event) => {

            if (
                event.detail.contactFormId === 32 ||
                event.detail.contactFormId === 389 ||
                event.detail.contactFormId === 180 ||
                event.detail.contactFormId === 133
            ) {
                
                this.connectAPI({
                    nome: $('[name=nome]', form).val(),
                    telefone: $('[name=fob-phone]', form).val(),
                    email: $('[name=email]', form).val(),
                    mensagem: $('[name=mensagem]', form).val(),
                    empresa: $('[name=empresa]', form).val(),
                });
            }
        }, false);
    }

    connectAPI(dadosDoFormulario) {
       
        const apiKey = '171DA7BA3E582197A441CDEDE285B917596526D834F1330A7E581B1C4F8E5EFC39C2E3B7102EDD83549B76409555323A247FD0B52E5DDDA9D8C543004F8E01A1';
        const apiUrl = 'https://api2.ploomes.com/';

        // Montar o objeto de dados para enviar à API do Ploomes
        const dados = {
            CompanyName: dadosDoFormulario.empresa,
            PersonName: dadosDoFormulario.nome,
            Email: dadosDoFormulario.email,
            Phones: [
                {
                    PhoneNumber: dadosDoFormulario.telefone
                }
            ],
            Origin: "Site",
            OwnerId: 0,
            OtherProperties: [
                {
                    FieldKey: "{mensagem}",
                    StringValue: dadosDoFormulario.mensagem
                },
            ]
           
        };

  // Opções da requisição, incluindo a API key nos cabeçalhos
  const requestOptions = {
    method: 'POST', // Método da requisição (GET, POST, etc.)
    headers: {
      Authorization: 'Bearer ' + apiKey, // Adicione a API key aos cabeçalhos
    },
    dataType: 'json', // Tipo de dado esperado na resposta (JSON neste caso)
  };

  // Faz a requisição usando $.ajax()
  $.ajax({
    url: apiUrl + 'leads',
    type: 'POST',
    data: JSON.stringify(dados),
    contentType: 'application/json',
    headers: {
        'Authorization': 'ApiKey ' + apiKey
      },
    success: function (response) {
      console.log('Resposta da API:', response);
    },
    error: function (error) {
      console.error('Erro na requisição:', error);
    }
  });

        // // Enviar os dados para a API do Ploomes usando a Fetch API
        // fetch(apiUrl + 'leads', {
        //     method: 'POST',
        //     headers: {
        //     'Authorization': `Bearer ${apiKey}`,
        //     'Content-Type': 'application/json',
        //     },
        //     body: JSON.stringify(dados),
        // })
        // .then(response => response.json())
        // .then(data => {
        //     // Aqui você pode lidar com a resposta da API do Ploomes, se necessário
        //     console.log(data);
        // })
        // .catch(error => {
        //     // Lidar com erros, se ocorrerem
        //     console.error('Erro ao enviar dados para o Ploomes:', error);
        // });    

    }
}