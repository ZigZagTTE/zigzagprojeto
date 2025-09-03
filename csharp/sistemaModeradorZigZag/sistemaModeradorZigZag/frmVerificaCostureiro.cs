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
    public partial class frmVerificaCostureiro : Form
    {
        public frmPainelCostureiro frmPainelCos { get; set; }
        private consultarBD consulta = new consultarBD();
        private verificarBD verifica = new verificarBD();
        private costureiro costureiro = new costureiro();

        public frmVerificaCostureiro()
        {
            InitializeComponent();
            AtualizarComboBox();

        }

        private void frmVerificaCostureiro_Load(object sender, EventArgs e)
        {
            if (frmPainelCos != null)
            {
                cbxId.Text = frmPainelCos.idSelecionado.ToString();
                btnVisualizar.PerformClick();
            }
        }

        private void btnVisualizar_Click(object sender, EventArgs e)
        {
            costureiro = consulta.GetCostureiro(Convert.ToInt32(cbxId.Text));

            txtID.Text = costureiro.CostureiroID.ToString();
            txtEmail.Text = costureiro.Email;
            txtNome.Text = costureiro.Nome;
            txtCPF.Text = costureiro.CPF.ToString();
            txtCNPJ.Text = costureiro.CNPJ.ToString();

            if (costureiro.Verificado == 0) 
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

            txtRua.Text = costureiro.Rua;
            txtBairro.Text = costureiro.Bairro;
            txtNumero.Text = costureiro.Numero.ToString();
            txtCidade.Text = costureiro.Cidade;
            txtEstado.Text = costureiro.Estado;
            txtCEP.Text = costureiro.CEP.ToString();

            gbxDados.Visible = true;

            AtualizarComboBox();
        }

        private void AtualizarComboBox()
        {
            cbxId.Items.Clear();
            cbxId.Items.AddRange(consulta.carregarIdComboBox("costureiro"));
        }

        private void btnVerificar_Click(object sender, EventArgs e)
        {
            verifica.verificaUsuario("costureiro", cbxId.Text, "1");
            btnVisualizar.PerformClick();
        }

        private void btnCancelar_Click(object sender, EventArgs e)
        {
            verifica.verificaUsuario("costureiro", cbxId.Text, "0");
            btnVisualizar.PerformClick();

        }
    }
}
