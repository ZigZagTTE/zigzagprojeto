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

        public int CostureiroID { get; set; }

        public string Email { get; set; }

        public string Nome { get; set; }

        public long CPF { get; set; }

        public long CNPJ { get; set; }

        public int Verificado { get; set; }

        public string Rua { get; set; }

        public string Bairro { get; set; }

        public long Numero { get; set; }

        public string Complemento { get; set; }

        public string Cidade { get; set; }

        public string Estado { get; set; }

        public int CEP { get; set; }
    }
}
