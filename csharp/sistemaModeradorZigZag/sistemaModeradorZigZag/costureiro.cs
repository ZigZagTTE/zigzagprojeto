using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace sistemaModeradorZigZag
{
    internal class costureiro
    {
        public costureiro() { }
        //ADICIONAR AS PROPRIEDADES COMO CORRESPONDENCIAS DOS CAMPOS DA TABELA
        public costureiro(string nome, string endereco, int idade)
        {
            this.Nome = nome;
            this.Endereco = endereco;
            this.Idade = idade;
        }

        private int _costureiroID;
        public int CostureiroID
        {
            get { return _costureiroID; }
            set { _costureiroID = value; }
        }

        private string nome;
        public string Nome
        {
            get { return nome; }
            set { nome = value; }
        }

        private int cpf;
        public int CPF
        {
            get { return cpf; }
            set { cpf = value; }
        }
    }
}
