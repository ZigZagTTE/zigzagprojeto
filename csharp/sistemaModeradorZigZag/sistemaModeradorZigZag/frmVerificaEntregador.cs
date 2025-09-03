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
    public partial class frmVerificaEntregador : Form
    {
        public frmPainelEntregador frmPainelEnt { get; set; }
        private consultarBD consulta = new consultarBD();
        private verificarBD verifica = new verificarBD();
        private entregador entregador = new entregador();

        public frmVerificaEntregador()
        {
            InitializeComponent();
            AtualizarComboBox();

        }

        private void frmVerificaEntregador_Load(object sender, EventArgs e)
        {
            if (frmPainelEnt != null)
            {
                cbxId.Text = frmPainelEnt.idSelecionado.ToString();
                btnVisualizar.PerformClick();
            }
        }

        private void btnVisualizar_Click(object sender, EventArgs e)
        {
            entregador = consulta.GetEntregador(Convert.ToInt32(cbxId.Text));

            txtID.Text = entregador.EntregadorID.ToString();
            txtEmail.Text = entregador.Email;
            txtNome.Text = entregador.Nome;
            txtCNH.Text = entregador.CNH.ToString();
            txtCPF.Text = entregador.CPF.ToString();
            txtTelefone.Text = entregador.Telefone.ToString();

            if (entregador.Verificado == 0)
            {
                txtVerificado.Text = "NÃO";
                txtVerificado.ForeColor = Color.FromArgb(247, 69, 69);
                txtVerificado.BackColor = Color.FromArgb(58, 55, 55);
            }
            else
            {
                txtVerificado.Text = "SIM";
                txtVerificado.ForeColor = Color.FromArgb(20, 252, 86);
                txtVerificado.BackColor = Color.FromArgb(58, 55, 55);
            }

            gbxDados.Visible = true;

            AtualizarComboBox();
        }

        private void btnVerificar_Click(object sender, EventArgs e)
        {
            verifica.verificaUsuario("entregador", cbxId.Text, "1");
            btnVisualizar.PerformClick();
        }

        private void btnCancelar_Click(object sender, EventArgs e)
        {
            verifica.verificaUsuario("entregador", cbxId.Text, "0");
            btnVisualizar.PerformClick();
        }

        private void AtualizarComboBox()
        {
            cbxId.Items.Clear();
            cbxId.Items.AddRange(consulta.carregarIdComboBox("costureiro"));
        }
    }
}
