using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace sistemaModeradorZigZag
{
    public partial class frmPainelEntregador : Form
    {
        public int idSelecionado { get; set; } = 0;
        public frmPainelEntregador()
        {
            InitializeComponent();
            consultarBD consulta = new consultarBD();

            lblNumVerificados.Text = consulta.GetNumeroUsuarios("entregador", 1);
            lblNumNaoVerificados.Text = consulta.GetNumeroUsuarios("entregador", 0);

            atualizarDataGridView();
        }

        public void atualizarDataGridView()
        {
            consultarBD consulta = new consultarBD();
            dataGridView1.DataSource = null;
            dataGridView1.Rows.Clear();
            dataGridView1.Columns.Clear();
            dataGridView1.Refresh();
            dataGridView1.DataSource = consulta.GetTodosDados("entregador");
            dataGridView1.DataMember = "dados";
        }

        private void btnVer_Click(object sender, EventArgs e)
        {
            this.idSelecionado = Convert.ToInt32(txtID.Text);
            frmVerificaEntregador frmEntregador = new frmVerificaEntregador();
            frmEntregador.frmPainelEnt = this;
            frmEntregador.Show();
        }
    }
}

