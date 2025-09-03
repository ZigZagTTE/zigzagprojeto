using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace sistemaModeradorZigZag
{
    internal class entregador
    {
        public entregador() { }

        public int EntregadorID { get; set; }

        public string Email { get; set; }

        public string Nome { get; set; }

        public long CNH { get; set; }

        public long CPF { get; set; }

        public long Telefone { get; set; }

        public int Verificado { get; set; }
    }
}
