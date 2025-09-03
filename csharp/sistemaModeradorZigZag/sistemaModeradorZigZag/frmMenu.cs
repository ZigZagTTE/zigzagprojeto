using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;

namespace sistemaModeradorZigZag
{
    public partial class frmMenu : Form
    {
        public frmMenu()
        {
            InitializeComponent();
        }

        private void costureiroToolStripMenuItem_Click(object sender, EventArgs e)
        {
            
            frmPainelCostureiro frmPainelCostureiro = new frmPainelCostureiro();
            frmPainelCostureiro.ShowDialog();

        }

        private void costureirosToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frmVerificaCostureiro frmVerificaCostureiro = new frmVerificaCostureiro();
            frmVerificaCostureiro.ShowDialog();
        }

        private void entregadoresToolStripMenuItem_Click(object sender, EventArgs e)
        {
            frmPainelEntregador frmPainelEntregador = new frmPainelEntregador();
            frmPainelEntregador.ShowDialog();
        }

        private void entregadoresToolStripMenuItem1_Click(object sender, EventArgs e)
        {
            frmVerificaEntregador frmVerificaEntregador = new frmVerificaEntregador();
            frmVerificaEntregador.ShowDialog();
        }

        private void sobreToolStripMenuItem_Click(object sender, EventArgs e)
        {
            info frmInfo = new info();
            frmInfo.ShowDialog();
        }

        private void sairToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Close();
        }


    }
}
